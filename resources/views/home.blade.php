@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

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

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
        }
    } else{
        echo "No Results";
    }

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
            $questionSql = "SELECT firstname, lastname, gender, birthday,
            q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, id, aboutme, postcode
            FROM users WHERE id = $currentID";
            $questionResult = mysqli_query($conn, $questionSql);
            $row = mysqli_fetch_assoc($questionResult);
            $matchPcent = 0;

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

            }if ($user->q10 == $row ['q10']){
                $matchPcent += 10;
            }

            $matchDetails = array("user"=>$row, "matchPcent"=>$matchPcent); //may want to change $row to $match
            array_push($matches, $matchDetails);


        }
        $currentID ++;
        $i++;
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



@section('content')
<div class="container">
    <h1>My Matches</h1><br>

    <div class="row">
        <div class="searchBox">
            <input type="text" id="input" class="input" onkeyup="searchFunction()" placeholder="Search..."/>
            <div class="icon"></div>
        </div>
    </div>
    <div class="row">
        <button class="btn btn-success" onclick="w3.toggleClass('#filterOptions','hideFilterOptions')">Toggle Advance Filter Options</button>
    </div>
    <div id="filterOptions"class="hideFilterOptions padding-y padding-x">
        <div class="row">
            <span>Filter by age:</span>
            <span>between</span>
            <input class="text-dark" type="number" id="lowerAge" min="18" max="125" value="18">
            <span>and</span>
            <input class="text-dark" type="number" id="upperAge" min="18" max="125" value="30">
            <button class="inline-button btn-primary" onclick="filterAge()">Filter</button>
        </div>
        <div class="row">
            <span>Filter by postcode:</span>
            <input class="text-dark" type="number" id="postcodeFilter" min="0" max="9999" value="3000">
            <button class="inline-button btn-primary" onclick="filterPostcode()">Filter</button>
        </div>

        <div class="side-container">
            <div class="filter-section filter-bottombar padding-y padding-x">
                <span class="whiteText">Filter by match %:</span>
                <input type="range" class="range" id="filterRange" min=0 max=100 oninput="updateFilter(this.value)" onchange="updateFilter(this.value)">
                <span id="filterPercent">50%</span>
                <button class="inline-button btn-primary" onclick="filterMatches()">Filter</button>
            </div>
        </div>
    </div>

    <div class="row" id="row">

    </div><br>
@for($matchCount=0; $matchCount<count($matches); $matchCount++)
    @if($matches[$matchCount]['matchPcent'] != 0)
    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">{{$matches[$matchCount]['matchPcent']}}%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">{{$matches[$matchCount]['user']['firstname']}} {{$matches[$matchCount]['user']['lastname']}}</h3>
            <p class="age card-text"><?php
              $from = new DateTime($matches[$matchCount]['user']['birthday']);
              $to = new DateTime('today');
              echo $from->diff($to)->y, " years old";?></p>
            <p class="postcode card-text">{{$matches[$matchCount]['user']['postcode']}}</p>
        </div>
    </div>
    @endif
@endfor
</div>



    <!-- Need w3.js to use their methods -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script>
    function updateFilter(val){
        document.getElementById("filterPercent").innerHTML=val+"%";
    }
   </script>
@endsection
