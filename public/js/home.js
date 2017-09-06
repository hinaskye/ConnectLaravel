/* Run script straight away */
var matchPercent = document.getElementsByClassName("matchingPercent");
for(var i=0; i<matchPercent.length; i++) {
    var percent_value = matchPercent[i].innerHTML.replace(/%/g,'');
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



/* search functions */
function searchFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("input");
    filter = input.value.toUpperCase();
    ul = document.getElementById("row");
    li = ul.getElementsByClassName("card col-md-4 col-sm-6");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("card col-md-4 col-sm-6")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}