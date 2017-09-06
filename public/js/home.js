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
$('.icon').click(function () {
    $('.input').toggleClass('expanded');
});