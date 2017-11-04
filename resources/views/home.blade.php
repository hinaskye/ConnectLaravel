<div class="cont">
@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php
    //matching Algorithm code.
    //creating connection to database with details
    $servername = "connectdb.ckktlmrdu53g.ap-southeast-2.rds.amazonaws.com";
    $username = "ConnectAdmin";
    $password = "password";
    $dbname = "UserDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
    //test to make sure DB connection is working.
    $sql = "SELECT id FROM users";
    $result = $conn->query($sql);


    //ID of the current user logged in
    $user = Auth::user();
    $userID = $user->id;

    //Getting the maximum ID of all the users in the DB
    $maxSql = "SELECT max(id) as id FROM users";
    $mResult=mysqli_query($conn,$maxSql);
    $row = mysqli_fetch_assoc($mResult);
    $maxID = $row['id'];

    $i = 1; //used as a counter int
    $currentID = 1; //current ID of User in DB
    $matchPcent = 0; //match percentage for users

    $matches = array(); //Keep track of all matches and their percentage

    //check to make sure have not reached the end of the DB
    while ($i <= $maxID){

        //Check to make sure you are not matching yourself
        if ($userID != $currentID){

            //Query DB for First users in DB answers to questions
            $questionSql = "SELECT firstname, lastname, gender,looking, myedu, matchingedu, birthday,
            q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, id, aboutme, postcode, favourite
            FROM users WHERE id = $currentID";
            $questionResult = mysqli_query($conn, $questionSql);
            $row = mysqli_fetch_assoc($questionResult);
            $matchPcent = 0;
            if ($user->looking == $row['gender'] or $user->looking == "both"){

                if($user->matchingedu == $row['myedu']){
                    if ($user->q1 == $row ['q1']){
                        $matchPcent += 10;
                    }
                    if ($user->q2 == $row ['q2']){
                        $matchPcent += 10;
                    }
                    if ($user->q3 == $row ['q3']){
                        $matchPcent += 10;
                    }
                    if ($user->q4 == $row ['q4']){
                        $matchPcent += 10;
                    }
                    if ($user->q5 == $row ['q5']){
                        $matchPcent += 10;
                    }
                    if ($user->q6 == $row ['q6']){
                        $matchPcent += 10;
                    }
                    if ($user->q7 == $row ['q7']){
                        $matchPcent += 10;
                    }
                    if ($user->q8 == $row ['q8']){
                        $matchPcent += 10;
                    }
                    if ($user->q9 == $row ['q9']){
                        $matchPcent += 10;
                    }
                    if ($user->q10 == $row ['q10']){
                        $matchPcent += 10;
                    }

                    $matchDetails = array("user"=>$row, "matchPcent"=>$matchPcent); //may want to change $row to $match
                    array_push($matches, $matchDetails);

                }

            }

        }
        $currentID ++;
        $i++;
    }



    //postcode to suburb algorithm

    $counter = 0;

    //query user DB to get the postcodes of all users are put them in an array
    $userPostCodeSQL = "SELECT postcode FROM users";
    $userPostCodeResult=mysqli_query($conn,$userPostCodeSQL);
    $userPostCode = mysqli_fetch_assoc($userPostCodeResult);

    $userPostCodeQuery = mysqli_query($conn, $userPostCodeSQL);
    $userPostcodeArray = array();


    $lowestSQL = "SELECT min(id) as id FROM users";
    $lResult=mysqli_query($conn,$lowestSQL);
    $row = mysqli_fetch_assoc($lResult);
    $lowID = $row['id'];



    $loopingID = (int)$lowID;

    //loops through every postcode in the user table and returns each postcode

    while ($loopRow = mysqli_fetch_assoc($userPostCodeQuery)){

        if ($userID != $loopingID){

            if ($counter < sizeof($matches)){

                if ($matches[$counter]['user']['id'] >= 0 ){

                    $correctPostCode = $matches[$counter]['user']['postcode'];

                    $userPostCodeSQL = "SELECT postcode FROM users WHERE postcode = $correctPostCode";
                    $userPostCodeResult = mysqli_query($conn,$userPostCodeSQL);
                    $userPostCode = mysqli_fetch_assoc($userPostCodeResult);
                    $userPostCodeQueryLoopRow = mysqli_query($conn, $userPostCodeSQL);

                    $postCodeLoopRow = mysqli_fetch_assoc($userPostCodeQueryLoopRow);


                    $userPostcodeArray[] = $postCodeLoopRow;
                    $searchPC = $postCodeLoopRow['postcode'];

                    //gives all the data for a row that matches the postcode of the users
                    $postcodeSql = "SELECT id, postcode, suburb, state, latitude, longitude
                     FROM postcodes WHERE postcode = $searchPC";
                    $pcResult = mysqli_query($conn, $postcodeSql);
                    $pcRow = mysqli_fetch_assoc($pcResult);


                    //query user DB to get the postcodes of all users are put them in an array
                    $userPostCodeSQL = "SELECT postcode FROM users";
                    $userPostCodeResult=mysqli_query($conn,$userPostCodeSQL);
                    $userPostCode = mysqli_fetch_assoc($userPostCodeResult);

                    //distance from user algorithm

                    //get the users postcode
                    $logUserPostCodeSQL = "SELECT postcode FROM users WHERE id = $userID";
                    $logUserPostCodeResult = mysqli_query($conn, $logUserPostCodeSQL);
                    $logUserPostCode = mysqli_fetch_assoc($logUserPostCodeResult);
                    $logUserPostCodeCall = $logUserPostCode['postcode'];

                    $lowestSQL = "SELECT min(id) as id FROM users";
                    $lResult=mysqli_query($conn,$lowestSQL);
                    $row = mysqli_fetch_assoc($lResult);
                    $lowID = $row['id'];

                    //get the users postcode to get latitude and longitude
                    $logUserLatSQL = "SELECT latitude FROM postcodes WHERE postcode = $logUserPostCodeCall";
                    $logUserLatResult = mysqli_query($conn, $logUserLatSQL);
                    $logUserLat = mysqli_fetch_assoc($logUserLatResult);
                    $logUserLatCall = $logUserLat['latitude'];

                    $logUserLonSQL = "SELECT longitude FROM postcodes WHERE postcode = $logUserPostCodeCall";
                    $logUserLonResult = mysqli_query($conn, $logUserLonSQL);
                    $logUserLon = mysqli_fetch_assoc($logUserLonResult);
                    $logUserLonCall = $logUserLon['longitude'];


                    $logUserLatCallConvert = floatval($logUserLatCall);
                    $logUserLonCallConvert = floatval($logUserLonCall);

                    $currentUserLat = $pcRow['latitude'];
                    $currentUserLatConvert = floatval($currentUserLat);

                    $currentUserLon = $pcRow['longitude'];
                    $currentUserLonConvert = floatval($currentUserLon);


                    //Longitude & Latitude to distance algorithm (code based of code from: http://www.geodatasource.com/developers/php)
                    $unit = "K";

                    $theta = $currentUserLonConvert - $logUserLonCallConvert;
                    $dist = sin(deg2rad($currentUserLatConvert)) * sin(deg2rad($logUserLatCallConvert)) +  cos(deg2rad($currentUserLatConvert)) * cos(deg2rad($logUserLatCallConvert)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $unit = strtoupper($unit);

                    //converting to Kilometres
                    $kilometresFloat = $miles * 1.6;
                    $kilometres = round($kilometresFloat);
                    if($kilometres > 0){
                        $locoArray = array("suburb"=>$pcRow['suburb'], "distance"=>$kilometres);
                    }
                    else{
                        $locoArray = array("suburb"=>$pcRow['suburb'], "distance"=>0);
                    }
                    array_push($matches[$counter], $locoArray);
                    ++$counter;


                }
            }

        }
        $loopingID++;
    }


    //sort matches by highest match percentage, uses anonymous function
    usort($matches, function($a, $b){
        return $b['matchPcent'] - $a['matchPcent'];
    });

    $conn->close();

    //test printing of matchDetails
    //print_r($matches);
    ?>


<?php
        $user = Auth::user();
        $userPostcode = $user->postcode;
        $json = "http://v0.postcodeapi.com.au/suburbs/" .$userPostcode.".json";
?>
<script type="text/javascript">
  function imgError(image) {
    image.onerror = "";
    image.src = "/images/blank-female-profile-user.png";
    return true;
}
</script>

@section('content')
    <div class="container">
        <h1>My Matches</h1><br>

        <div class="row">
            <div class="searchBox">
                <input type="text" id="input" name="input" class="input" onkeyup="searchFunction()" placeholder="Search..."/>
                <div class="icon"></div>
            </div>
        </div>
        <div class="row padding-bottom">
            <button class="btn btn-success" name="buttonFilter" onclick="w3.toggleClass('#filterOptions','hideFilterOptions')">Toggle Advance Filter Options</button>
        </div>
        <div id="filterOptions"class="hideFilterOptions padding-y padding-x">
            <div class="row">
                <input id="genderFilterCheck" type="checkbox" name="genderCheckBox">
                <span>Filter by gender:</span>
                <select id="genderFilter" class="text-dark">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="any">Any</option>
                </select>
                <button class="inline-button btn-primary hidden" onclick="filterGender()">Filter</button>
            </div>
            <div class="row padding-top">
                <input id="ageFilterCheck" type="checkbox" name="ageCheckBox">
                <span>Filter by age:</span>
                <span>between</span>
                <input class="text-dark" type="number" id="lowerAge" min="18" max="125" value="18">
                <span>and</span>
                <input class="text-dark" type="number" id="upperAge" min="18" max="125" value="30">
                <button class="inline-button btn-primary hidden" onclick="filterAge()">Filter</button>
            </div>
            <div class="row padding-top">
                <input id="distanceFilterCheck" type="checkbox" name="distanceCheckBox">
                <span>Filter by distance:</span>
                <span><</span>
                <input class="text-dark" type="text" id="distanceFilter" value="10" pattern="^[0-9]{1,4}$" maxLength="4" size="4"><span>km</span>
                <button class="inline-button btn-primary hidden" onclick="filterDistance()">Filter</button>
                <span id="distanceError" class="text-red padding-x"></span>
            </div>
            <div class="row padding-top">
                <input id="postcodeFilterCheck" type="checkbox" name="postcodeCheckBox">
                <span>Filter by postcode:</span>
                <input class="text-dark" type="text" id="postcodeFilter" value="3000" maxlength="4" size="4"
                       pattern="^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$">
                <button class="inline-button btn-primary hidden" onclick="filterPostcode()">Filter</button>
                <span id="postcodeError" class="text-red padding-x"></span>
            </div>

            <div class="row padding-top">
                <div class="padding-bottom">
                    <input id="matchPercentCheck" type="checkbox" name="percentCheckBox">
                    <span class="whiteText">Filter by match %:</span>
                    <input type="range" class="range" id="filterRange" min=0 max=100 oninput="updateFilter(this.value)" onchange="updateFilter(this.value)">
                    <span id="filterPercent">50%</span>
                    <button class="inline-button btn-primary hidden" name="filter" onclick="filterMatches()">Filter</button>
                    <br><button id="filterSelected" class="inline-button btn-danger margin-top" onclick="filterAllSelected()">Filter Selected</button>
                </div>
                <div class="filter-bottombar"></div>
            </div>
        </div>

        <div class="row" id="row">

        </div><br>
        @for($matchCount=0; $matchCount<count($matches); $matchCount++)
            @if($matches[$matchCount]['matchPcent'] != 0)
            <?php
                $key = $matches[$matchCount]['user']['id'];

                $file['url']= 'https://s3-ap-southeast-2.amazonaws.com/profile.pictures.pp'.'/'.$key;
            ?>
                <div class="card col-md-4 col-sm-6">
                    <form id="idForm" method="POST" action="/uniqueprofile">
                        <p class="matchingPercent">{{$matches[$matchCount]['matchPcent']}}%</p>
                        <br>
                        <img class="card-img-top" src="{!! $file['url'] !!}"  onerror="imgError(this);" width="100%" height="300em" alt="Match Image" style="border-radius: 3em;">
                        <div class="card-body">
                            <p id="blank{{ $matches[$matchCount]['user']['id'] }}" class="card-text  display-inlineblock pull-right" onclick="like({{ $matches[$matchCount]['user']['id'] }})" >
                                <i class="fa fa-heart-o fa-2x margin-right-16 text-large text-grey"></i>
                            </p>
                            <p id="fill{{ $matches[$matchCount]['user']['id'] }}" class="card-text  display-none pull-right" onclick="like({{ $matches[$matchCount]['user']['id'] }})" >
                                <i class="fa fa-heart fa-2x margin-right-16 text-large text-grey"></i>
                            </p>
                            <h3 class="card-title">{{$matches[$matchCount]['user']['firstname']}} {{$matches[$matchCount]['user']['lastname']}}</h3>
                            <input type="hidden" class="match-gender" value="{{$matches[$matchCount]['user']['gender']}}">
                            <p class="card-text">Approx: <span class="distance">{{$matches[$matchCount]['0']['distance']}}</span>kms away</p>
                            <p class="card-text">{{"Suburb: ".$matches[$matchCount]['0']['suburb']}}</p>
                            <p class="age card-text"><?php
                                $from = new DateTime($matches[$matchCount]['user']['birthday']);
                                $to = new DateTime('today');
                                echo $from->diff($to)->y, " years old";?></p>
                            <p class="postcode card-text">{{$matches[$matchCount]['user']['postcode']}}</p>
                            {{ csrf_field() }}
                            <input type="hidden" id="idInput" name="id" value={{$matches[$matchCount]['user']['id']}} >
                              <button type="submit" class="btn btn-primary pull-right margin-bottom">View My Profile</button>
                            <button type="button" href="#" id="chat{{ $matches[$matchCount]['user']['id'] }}" class="btn btn-primary display-inlineblock pull-right" disabled>
                                <i class="hidden fa fa-comments fa-2x margin-right-16 text-large text-grey"></i>
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        @endfor
    </div>
</div>

<!-- Need w3.js to use their methods -->
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script>
    function updateFilter(val){
        document.getElementById("filterPercent").innerHTML=val+"%";
    }

    function like(id){
        var id = id.toString();
        var blank = document.getElementById("blank"+id);
        var fill = document.getElementById("fill"+id);
        if(blank.style.display === 'inline-block'){
            fill.style.display = 'inline-block';
            blank.style.display = 'none';
            document.getElementById('chat'+id).disabled = false;
        }
        else{
            fill.style.display = 'none';
            blank.style.display = 'inline-block';
            document.getElementById('chat'+id).disabled = true;
        }
    }

    function submitForm() {
        document.getElementById('idForm').submit();
    }
</script>
@endsection
