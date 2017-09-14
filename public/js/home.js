/* Run script straight away */
var matchPercent = document.getElementsByClassName("matchingPercent");
/* For each match card add background colour based on match percentage */
for(var i=0; i<matchPercent.length; i++) {
    var percent_value = parseInt(matchPercent[i].innerHTML.replace(/%/g,''));
    if(percent_value<= 60) {
        w3.addClass(matchPercent[i],'bg-red-xs');
    }
    else if(percent_value <= 70) {
        w3.addClass(matchPercent[i], 'bg-red-s')
    }
    else if(percent_value <= 80) {
        w3.addClass(matchPercent[i], 'bg-red-m')
    }
    else if(percent_value <= 90) {
        w3.addClass(matchPercent[i], 'bg-red-l')
    }
    else if(percent_value <= 100) {
        w3.addClass(matchPercent[i], 'bg-red-xl')
    }
}

/* Functions */

/* filter function */
function filterMatches() {
    var filterPercentString = document.getElementById("filterPercent").innerHTML.replace(/%/g,'');
    var filterPercent = parseInt(filterPercentString);

    /* for each match*/
    for(var i=0; i<matchPercent.length; i++) {
        var percent_value = parseInt(matchPercent[i].innerHTML.replace(/%/g,''));
        /* remove hidden first */
        w3.removeClass(matchPercent[i].parentElement, 'hidden');
        if(percent_value<filterPercent) {
            /* add hidden based on filter */
            w3.addClass(matchPercent[i].parentElement, 'hidden');
        }
    }
}

/* search functions */
function searchFunction() {
    $("input").on("keyup", function() {
        var g = $(this).val().toLowerCase();
        $(".card.col-md-4.col-sm-6 .card-body").each(function() {
            var s = $(this).text().toLowerCase();
            $(this).closest('.card.col-md-4.col-sm-6')[ s.indexOf(g) !== -1 ? 'show' : 'hide' ]();
        });
    })
}

/* Michael */
function passID(){
  alert(passID.caller.arguments[0].target.id);
}
