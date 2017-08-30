@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <h1>My Matches</h1><br>
    <div class="row">
        Filter to be implemented
    </div><br>

    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 1</h3>
            <p class="card-text">Age: 18</p>
        </div>
    </div>
    
    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 2</h3>
            <p class="card-text">Age: 20</p>
        </div>
    </div>
    
    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 3</h3>
            <p class="card-text">Age: 25</p>
        </div>
    </div>

    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 4</h3>
            <p class="card-text">Age: 23</p>
        </div>
    </div>

    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 5</h3>
            <p class="card-text">Age: 22</p>
        </div>
    </div>
    
    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 6</h3>
            <p class="card-text">Age: 26</p>
        </div>
    </div>
</div>





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
                    echo "id: " . $row["id"]."<br>";
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
            echo "Max id: ". $maxID;

            $i = 1; //used as a counter int
            $currentID = 1; //current ID of User in DB
            $matchPcent = 0; //match percentage for users
            //check to make sure have not reached the end of the DB
            while ($i < $maxID){

                //Check to make sure you are not matching yourself
                if ($userID != $currentID){

                    //Query DB for First users in DB answers to questions
                    $questionSql = "SELECT q1, q2, q3, q4, q5, q6, q7, q8, q9, q10 FROM users WHERE id = $currentID";
                    $questionResult = mysqli_query($conn, $questionSql);
                    $row = mysqli_fetch_assoc($questionResult);
                    echo "<br>". "This is row q1: " . $row ['q1'];
                    echo "<br>". "MatchPercentage: " . $matchPcent;
                    echo "<br>". "Start loop ";
                    $loopchecker = 1;
                    if ($user->q1 == $row ['q1']){
                        $matchPcent += 10;
                        if ($user->q2 == $row ['q2']){
                            $matchPcent += 10;
                            if ($user->q3 == $row ['q3']){
                                $matchPcent += 10;
                                if ($user->q4 == $row ['q4']){
                                    $matchPcent += 10;
                                    if ($user->q5 == $row ['q5']){
                                        $matchPcent += 10;
                                        if ($user->q6 == $row ['q6']){
                                            $matchPcent += 10;
                                            if ($user->q7 == $row ['q7']){
                                                $matchPcent += 10;
                                                if ($user->q8 == $row ['q8']){
                                                    $matchPcent += 10;
                                                    if ($user->q9 == $row ['q9']){
                                                        $matchPcent += 10;
                                                        if ($user->q10 == $row ['q10']){
                                                            $matchPcent += 10;
                                                            echo "<br>" . "CurrentID: " .$currentID. "Final Match score: " . $matchPcent;
                                                            echo $loopchecker;
                                                            $loopchecker += 1;

                                                        }

                                                    }

                                                }

                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }





                }
                $currentID ++;
                $i++;
            }


            $conn->close();


    ?>




@endsection
