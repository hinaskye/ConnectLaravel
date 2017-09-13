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

        //postcode code

        $userPostCodeSQL = "SELECT postcode FROM users";
        $userPostCodeResult=mysqli_query($conn,$userPostCodeSQL);
        $userPostCode = mysqli_fetch_assoc($userPostCodeResult);
        echo $userPostCode['postcode'];
        $maxPostCodeSql = "SELECT max(postcode) as postcode FROM postcodes";
        $mPostCodeResult=mysqli_query($conn,$maxPostCodeSql);
        $mPostCodeRow = mysqli_fetch_assoc($mPostCodeResult);
        $maxPostCode = $mPostCodeRow['postcode'];
        echo $maxPostCode;

        $postcodeSql = "SELECT postcode, suburb, state, latitude, longitude
            FROM postcodes";
        $pcResult = mysqli_query($conn, $postcodeSql);
        $pcRow = mysqli_fetch_assoc($pcResult);

        echo "   ";
        echo $pcRow ['suburb'];
        echo "   ";
        echo $pcRow['postcode'];
        echo "   ";
        echo $userPostCode['postcode'];


        $x = 200;

        while ($x <= $maxPostCode){
        if ($pcRow ['postcode'] == $userPostCode['postcode']){
            echo $pcRow ['suburb'];
            echo "SHE LOOPS";
        }
            echo "   ";
        echo $x;
            echo "   ";
        $x ++;
            echo "   ";
        echo $x;
            echo "   ";
        }




    //sort matches by highest match percentage, uses anonymous function
    usort($matches, function($a, $b){
        return $b['matchPcent'] - $a['matchPcent'];
    });

    $conn->close();

    //test printing of matchDetails
    //print_r($matches);
?>







@section('content')
<div class="container">
    <h1>My Matches</h1><br>

    <div class="searchBox">
        <input type="text" id="input" class="input" onkeyup="searchFunction()" placeholder="Search..."/>
        <div class="icon"></div>
    </div>
    <div class="side-container">
         <div class="filter-section filter-bottombar filter-padding">
              <span class="whiteText">Filter:</span> 
              <input type="range" class="range" id="filterRange" min=0 max=100 oninput="updateFilter(this.value)" onchange="updateFilter(this.value)">
              <span id="filterPercent">50%</span>
              <button class="inline-button button-white" onclick="filterMatches()">Filter</button>
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
            <p class="card-text">{{$matches[$matchCount]['user']['birthday']}}</p>
            <p class="card-text">{{$matches[$matchCount]['user']['postcode']}}</p>
        </div>
    </div>
    @endif
@endfor




    <!-- Need w3.js to use their methods -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script>
    function updateFilter(val){
        document.getElementById("filterPercent").innerHTML=val+"%";
    }
   </script>  
@endsection
