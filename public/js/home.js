/* Run script straight away */
var matchPercent = document.getElementsByClassName("matchingPercent");
/* For each match card add background colour based on match percentage */
for(var i=0; i<matchPercent.length; i++) {
    var percent_value = parseInt(matchPercent[i].innerHTML.replace(/%/g,''));
    if(percent_value<= 20) {
        w3.addClass(matchPercent[i],'bg-red-xxxs');
    }
    else if(percent_value<= 30) {
        w3.addClass(matchPercent[i],'bg-red-xxs');
    }
    else if(percent_value<= 40) {
        w3.addClass(matchPercent[i],'bg-red-xs');
    }
    else if(percent_value<= 50) {
        w3.addClass(matchPercent[i],'bg-red-s');
    }
    else if(percent_value<= 60) {
        w3.addClass(matchPercent[i],'bg-red-m');
    }
    else if(percent_value <= 70) {
        w3.addClass(matchPercent[i], 'bg-red-l')
    }
    else if(percent_value <= 80) {
        w3.addClass(matchPercent[i], 'bg-red-xl')
    }
    else if(percent_value <= 90) {
        w3.addClass(matchPercent[i], 'bg-red-xxl')
    }
    else if(percent_value <= 100) {
        w3.addClass(matchPercent[i], 'bg-red-xxxl')
    }
}

/* Functions */

/* Recursively call */
function getParentCard(targetElement) {
    var parent = targetElement.parentElement;
    if(parent != null)
    {
        if(parent.classList.contains("card"))
        {
            return parent;
        }
        else
        {
            getParentCard(parent);
        }
    }
    return null;
}

/* filter functions */

/* filter by match %*/
function filterMatches() {
    var filterPercentString = document.getElementById("filterPercent").innerHTML.replace(/%/g,'');
    var filterPercent = parseInt(filterPercentString);

    /* for each match*/
    for(var i=0; i<matchPercent.length; i++) {
        var percent_value = parseInt(matchPercent[i].innerHTML.replace(/%/g,''));
        /* remove hidden first */
        w3.removeClass(matchPercent[i].parentElement.parentElement, 'hidden');
        if(percent_value<filterPercent) {
            /* add hidden based on filter */
            w3.addClass(matchPercent[i].parentElement.parentElement, 'hidden');
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
        w3.removeClass(genders[i].parentElement.parentElement.parentElement, 'hidden');
        /* only filter if choose male or female */
        if(genderSelected != "any")
        {
            if(genderSelected == "male")
            {
                if(gender != "male")
                {
                    w3.addClass(genders[i].parentElement.parentElement.parentElement, 'hidden');
                }
            }
            else
            {
                if(gender != "female")
                {
                    w3.addClass(genders[i].parentElement.parentElement.parentElement, 'hidden');
                }
            }
        }
    }
}

/* filter by distance */
function filterDistance() {
    var distanceSelected = parseInt(document.getElementById("distanceFilter").value);
    var distances = document.getElementsByClassName("distance");

    var isValid = validateDistance();

    if(isValid)
    {
        for(var i=0; i<distances.length; i++)
        {
            distance_value = parseInt(distances[i].innerHTML);
            w3.removeClass(distances[i].parentElement.parentElement.parentElement.parentElement, 'hidden');
            if(distance_value > distanceSelected) {
                w3.addClass(distances[i].parentElement.parentElement.parentElement.parentElement, 'hidden');
            }
        }
    }
}

/* performs validation without a form on distance */
function validateDistance() {
    var distanceSelected = document.getElementById("distanceFilter");
    if(distanceSelected.checkValidity() == false)
    {
        document.getElementById("distanceError").innerHTML = "Invalid Distance, must be 0 to 9999";
        return false;
    }
    else
    {
        document.getElementById("distanceError").innerHTML = "";
        return true;
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
            w3.removeClass(postcodes[i].parentElement.parentElement.parentElement, 'hidden');
            if(postcode_value != postcodeSelected) {
                w3.addClass(postcodes[i].parentElement.parentElement.parentElement, 'hidden');
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
            w3.removeClass(ages[i].parentElement.parentElement.parentElement, 'hidden');
            if(age_value<lowerAge || age_value > upperAge)
            {
                w3.addClass(ages[i].parentElement.parentElement.parentElement, 'hidden');
            }
        }
    }
}

// Filters all selected filter options user has selected
function filterAllSelected() {
    // Get list of all matches details
    var filterPercentString = document.getElementById("filterPercent").innerHTML.replace(/%/g,'');
    var filterPercent = parseInt(filterPercentString);
    var genderFilter = document.getElementById("genderFilter");
    var genderSelected = genderFilter.options[genderFilter.selectedIndex].value;
    var genders = document.getElementsByClassName("match-gender");
    var distanceSelected = parseInt(document.getElementById("distanceFilter").value);
    var distances = document.getElementsByClassName("distance");
    var postcodeSelected = parseInt(document.getElementById("postcodeFilter").value);
    var postcodes = document.getElementsByClassName("postcode");
    var lowerAge = parseInt(document.getElementById("lowerAge").value);
    var upperAge = parseInt(document.getElementById("upperAge").value);
    var ages = document.getElementsByClassName("age");

    // Check to see which options user has selected to filter
    var percentCheck = document.getElementById("matchPercentCheck").checked;
    var genderCheck = document.getElementById("genderFilterCheck").checked;
    var distanceCheck = document.getElementById("distanceFilterCheck").checked;
    var postcodeCheck = document.getElementById("postcodeFilterCheck").checked;
    var ageCheck = document.getElementById("ageFilterCheck").checked;

    // Validation
    var isDistanceValid = validateDistance();
    var isPostcodeValid = validatePostcode();
    if(isDistanceValid && isPostcodeValid)
    {
        if(lowerAge>upperAge)
        {
            /* throw an error to user if lower age is not lower than upper age */
            alert("Lower age specified is higher than the highest age specified!");
        }
        else
        {

        }
    }

    // For all matches
    for(var i=0; i<matchPercent.length; i++) {
        var percent_value = parseInt(matchPercent[i].innerHTML.replace(/%/g,''));
        gender = genders[i].value;
        distance_value = parseInt(distances[i].innerHTML);
        postcode_value = parseInt(postcodes[i].innerHTML);
        age_value = parseInt(ages[i].innerHTML);
        /* remove hidden first */
        w3.removeClass(matchPercent[i].parentElement.parentElement, 'hidden');
        // filter by percentage
        if(percentCheck == true)
        {
            if(percent_value<filterPercent) {
                /* add hidden based on filter */
                w3.addClass(matchPercent[i].parentElement.parentElement, 'hidden');
            }
        }
        // filter by gender
        if(genderCheck == true)
        {
            if(genderSelected != "any")
            {
                if(genderSelected == "male")
                {
                    if(gender != "male")
                    {
                        w3.addClass(genders[i].parentElement.parentElement.parentElement, 'hidden');
                    }
                }
                else
                {
                    if(gender != "female")
                    {
                        w3.addClass(genders[i].parentElement.parentElement.parentElement, 'hidden');
                    }
                }
            }
        }
        // filter by distance
        if(distanceCheck == true)
        {
            if(distance_value > distanceSelected) {
                w3.addClass(distances[i].parentElement.parentElement.parentElement.parentElement, 'hidden');
            }
        }
        // filter by postcode
        if(postcodeCheck == true)
        {
            if(postcode_value != postcodeSelected) {
                w3.addClass(postcodes[i].parentElement.parentElement.parentElement, 'hidden');
            }
        }
        // filte by age
        if(ageCheck == true)
        {
            if(age_value<lowerAge || age_value > upperAge)
            {
                w3.addClass(ages[i].parentElement.parentElement.parentElement, 'hidden');
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

/* Michael */
function passID(){
  alert(passID.caller.arguments[0].target.id);
}
