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

/* filter functions */

/* filter by match %*/
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

/* filter by gender */
function filterGender() {
    var genderFilter = document.getElementById("genderFilter");
    var genderSelected = genderFilter.options[genderFilter.selectedIndex].value;
    /* get gender of each card */
    var genders = document.getElementsByClassName("match-gender");
    
    /* for each match */
    for(var i=0; i<genders.length; i++) {
        gender = genders[i].value; /* current match's gender */
        w3.removeClass(genders[i].parentElement.parentElement, 'hidden');
        /* only filter if choose male or female */
        if(genderSelected != "any")
        {
            if(genderSelected == "male")
            {
                if(gender != "male")
                {
                    w3.addClass(genders[i].parentElement.parentElement, 'hidden');
                }
            }
            else
            {
                if(gender != "female")
                {
                    w3.addClass(genders[i].parentElement.parentElement, 'hidden');
                }
            }
        }
    }
}

/* filter by postcode */
/* similar to filter by match */
function filterPostcode() {
    var postcodeSelected = parseInt(document.getElementById("postcodeFilter").value);
    var postcodes = document.getElementsByClassName("postcode");

    var isValid = validatePostcode();
    
    if(isValid)
    {
        for(var i=0; i<postcodes.length; i++) {
            postcode_value = parseInt(postcodes[i].innerHTML);
            w3.removeClass(postcodes[i].parentElement.parentElement, 'hidden');
            if(postcode_value != postcodeSelected) {
                w3.addClass(postcodes[i].parentElement.parentElement, 'hidden');
            }
        }
    }
}

/* performs validation without a form on postcode */
function validatePostcode() {
    var postcodeSelected = document.getElementById("postcodeFilter");
    if(postcodeSelected.checkValidity() == false)
    {
        document.getElementById("postcodeError").innerHTML = "Invalid Australian Postcode";
        return false;
    }
    else
    {
        document.getElementById("postcodeError").innerHTML = "";
        return true;
    }
}

/* filter by age */
function filterAge() {
    var lowerAge = parseInt(document.getElementById("lowerAge").value);
    var upperAge = parseInt(document.getElementById("upperAge").value);
    var ages = document.getElementsByClassName("age");

    if(lowerAge>upperAge)
    {
        /* throw an error to user if lower age is not lower than upper age */
        alert("Lower age specified is higher than the highest age specified!");
    }
    else
    {
        for(var i=0; i<ages.length; i++) {
            age_value = parseInt(ages[i].innerHTML);
            w3.removeClass(ages[i].parentElement.parentElement, 'hidden');
            if(age_value<lowerAge || age_value > upperAge)
            {
                w3.addClass(ages[i].parentElement.parentElement, 'hidden');
            }
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