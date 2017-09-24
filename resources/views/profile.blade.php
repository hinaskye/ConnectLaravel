<!DOCTYPE html>
@extends('layouts.app')

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

$counter = (int)$lowID-1;
$loopingID = (int)$lowID;


//loops through every postcode in the user table and returns each postcode
while ($loopRow = mysqli_fetch_assoc($userPostCodeQuery)){

    if ($userID != $loopingID){
        if($matches[$counter]['user'] != null){
            $userPostcodeArray[] = $loopRow;
            $searchPC = $loopRow['postcode'];

            //gives all the data for a row that matches the postcode of the users
            $postcodeSql = "SELECT id, postcode, suburb, state, latitude, longitude
                    FROM postcodes WHERE postcode = $searchPC";
            $pcResult = mysqli_query($conn, $postcodeSql);
            $pcRow = mysqli_fetch_assoc($pcResult);


            //distance from user algorithm

            //get the users postcode
            $logUserPostCodeSQL = "SELECT postcode FROM users WHERE id = $userID";
            $logUserPostCodeResult = mysqli_query($conn, $logUserPostCodeSQL);
            $logUserPostCode = mysqli_fetch_assoc($logUserPostCodeResult);
            $logUserPostCodeCall = $logUserPostCode['postcode'];


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
            $locoArray = array("suburb"=>$pcRow['suburb'], "distance"=>$kilometres);
            array_push($matches[$counter], $locoArray);

            ++$counter;
        }

    }
    $loopingID++;
}

//sort matches by highest match percentage, uses anonymous function
usort($matches, function($a, $b){
    return $b['matchPcent'] - $a['matchPcent'];
});

$conn->close();
?>

@section('content')
<html>
<title>Connect Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<body>

<!-- Page Container -->
<div class="container" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="row">

    <!-- Left Column -->
    <div id="user-profile" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 animate-left">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
          <img src="{{ asset('images/profile.jpg') }}" style="width:100%" alt="Avatar">

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <br>
          <legend class="text-white">
          	<?php echo $user->firstname," ", $user->lastname; ?>
          	<a class="btn" href="#"  onclick="toggleSetting()"><i class="fa fa-cog fa-fw margin-right-16 text-large text-grey pull-right"></i></a>
          </legend>
          <p><i class="fa fa-user fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->gender; ?></p>
          <p><i class="fa fa-envelope fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->email; ?></p>
          <p><i class="fa fa-birthday-cake fa-fw margin-right-16 text-large text-grey"></i><?php
            $from = new DateTime($user->birthday);
            $to = new DateTime('today');
            echo $from->diff($to)->y, " years old";?></p>
          <hr>
          <br>
        </div>
      </div>
    </div>

	<!-- Toggle settings -->
    <div id="settings" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 animate-left display-none">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
      	<h2>Settings</h2>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
          <img src="{{ asset('images/profile.jpg') }}" style="width:100%" alt="Avatar">

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <br>
          <legend class="text-white">
          	<?php echo $user->firstname," ", $user->lastname; ?>
          	<a class="btn" href="#" onclick="toggleSetting()"><i class="fa fa-times fa-fw margin-right-16 text-large text-grey pull-right"></i></a>
          </legend>
          <form>
			  <div class="setting-input">
			    <span><i class="fa fa-user fa-fw margin-right-16 text-large text-grey"></i></span>
			    <select>
			    	<option>Male</option>
			    	<option>Female</option>
			    </select>
			  </div>
			  <div class="setting-input">
			    <span><i class="fa fa-envelope fa-fw margin-right-16 text-large text-grey"></i></span>
			    <input type="text" placeholder="Email Address" value=<?php echo htmlentities($user->email); ?>>
			  </div>
			  <div class="setting-input">
			    <span><i class="fa fa-birthday-cake fa-fw margin-right-16 text-large text-grey"></i></span>
			    <input type="date" placeholder="birthday" value=<?php echo htmlentities($user->birthday); ?>>
			  </div>
			  <div class="setting-input pull-right">
			  	<input class="btn btn-default " type="submit" value="Edit">
			  </div>
		  </form>
		  <br>
          <hr>
          <br>
        </div>
      </div>
    </div>
    <!-- End Left Column -->

    <!-- Right Column -->
    <div id="user-info" class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
        <div class="col-lg-12 col-md-12">
          <legend>
          	<h3 class="display-inline-block margin-top-10">About Me</h3>
          	<a class="btn display-inline pull-right" href="#"  onclick="toggleUser()"><i class="fa fa-cog fa-fw margin-right-16 text-large text-grey"></i></a>
          </legend>
          <p><?php echo $user->aboutme; ?></p>
          <hr>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <legend><h3>Questions I answered...</h3></legend>
          <h4><li>Favourite Movie Genre</li></h4>
            <p> I like to watch
            <?php  if ($user->q1 == "1")
              {
              echo "Action";
              } elseif ($user->q1 == "2")
              {
              echo "Romance";
              } elseif ($user->q1 == "3")
              {
              echo "Comedy";
              } elseif ($user->q1 == "4")
              {
              echo "Horror";
              } elseif ($user->q1 == "5")
              {
              echo "Thriller";
              } elseif ($user->q1 == "6")
              {
              echo "Sci-Fi";
              } elseif ($user->q1 == "7")
              {
              echo "Disney";
              }
            ?> movies!</p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>My activity level...</li></h4>
          <p><?php  if ($user->q2 == "1")
            {
            echo "Active";
            } elseif ($user->q2 == "2")
            {
            echo "Moderate";
            } elseif ($user->q2 == "3")
            {
            echo "Couch Potato";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Stay at home or go out?</li></h4>
          <p><?php  if ($user->q3 == "1")
            {
            echo "Stay at home!";
            } elseif ($user->q3 == "2")
            {
            echo "Go out with friends!";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Am I funny?</li></h4>
          <p><?php  if ($user->q4 == "1")
            {
            echo "Of course!";
            } elseif ($user->q4 == "2")
            {
            echo "Not really :(";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Eat out or at home?</li></h4>
          <p>I like to <?php  if ($user->q5 == "1")
            {
            echo "eat out.";
            } elseif ($user->q5 == "2")
            {
            echo "cook at home.";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Animal lover?</li></h4>
          <p><?php  if ($user->q6 == "1")
            {
            echo "Love em!";
            } elseif ($user->q6 == "2")
            {
            echo "Nope!!!";
          } elseif ($user->q6 == "3")
            {
            echo "Don't hate nor like em'";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Play a musical instrument?</li></h4>
          <p><?php  if ($user->q7 == "1")
            {
            echo "Hell yeah!";
            } elseif ($user->q7 == "2")
            {
            echo "Nope!!!";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Do you admit mistakes?</li></h4>
          <p><?php  if ($user->q8 == "1")
            {
            echo "Yep";
            } elseif ($user->q8 == "2")
            {
            echo "Nope!!!";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Like reading?</li></h4>
          <p><?php  if ($user->q9 == "1")
            {
            echo "Yep, books are awesome!";
            } elseif ($user->q9 == "2")
            {
            echo "Nope, reading isn't for me";
            }
            ?></p><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Do I believe in fate??</li></h4>
          <p><?php  if ($user->q10 == "1")
            {
            echo "Yeah, I am waiting for the one <3";
            } elseif ($user->q10 == "2")
            {
            echo "No, who believes in that make believe?";
            }
            ?></p><br>
        </div>
      </div>

  </div>

<!-- User Info Settings -->
<div id="user-info-settings" class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom display-none">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
      	<h2>Settings</h2>
        <div class="col-lg-12 col-md-12">
        <form>
          <legend>
          	<h3 class="display-inline-block">About Me</h3>
          	<a class="btn  display-inline pull-right" href="#"  onclick="toggleUser()"><i class="fa fa-times fa-fw margin-right-16 text-large text-grey"></i></a>
          </legend>
          <input type="text" placeholder="About Me" value=<?php echo htmlentities($user->aboutme); ?>>
          <hr>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <legend><h3>Questions I answered...</h3></legend>
          <h4><li>Favourite Movie Genre</li></h4>
            <select>
		    	<option >Action</option>
		    	<option>Romance</option>
		    	<option>Comedy</option>
		    	<option>Horror</option>
		    	<option>Thriller</option>
		    	<option>Sci-fi</option>
		    	<option>Disney</option>
		    </select>
		    <br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>My activity level...</li></h4>
            <select>
            	<option>Active</option>
		    	<option>Moderate</option>
		    	<option>Couch Potato</option>
		    </select>
            <br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Stay at home or go out?</li></h4>
            <select>
            	<option>Stay at home!</option>
            	<option>Go out with friends!</option>
            </select>
            <br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Am I funny?</li></h4>
            <select>
            	<option value="1">Of course!</option>
            	<option value="2">Not really</option>
            </select>
            <br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Eat out or at home?</li></h4>
            <select>
            	<option>eat out</option>
            	<option>cook at home</option>
            </select>
            <br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Animal lover?</li></h4>
            <select>
            	<option>Love em!</option>
            	<option>Nope!!!</option>
            	<option>Don't hate not like em</option>
            </select><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Play a musical instrument?</li></h4>
            <select>
            	<option>Hell yeah!</option>
            	<option>Nope!!!</option>
            </select><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Do you admit mistakes?</li></h4>
            <select>
            	<option>Yep</option>
            	<option>Nope!!!</option>
            </select><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Like reading?</li></h4>
            <select>
            	<option> Yep, books are awesome!</option>
            	<option>Nope, reading isn't for me</option>
            </select><br>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4><li>Do I believe in fate??</li></h4>
            <select>
            	<option>Yeah, I am waiting for the one! </option>
            	<option>No, who believes in that make believe?</option>
            </select><br>
        </div>
       	 <div class="setting-input pull-right">
	  		<input class="btn btn-default " type="submit" value="Edit">
	 	 </div>
      </div>
 	 </form>
    <!-- End Right Column -->
    </div>

  <!-- End Grid -->

  <!-- End Page Container -->
</div>

<script type="text/javascript">
	function toggleSetting() {
    var setting = document.getElementById('settings');
    var user = document.getElementById('user-profile');
    if (setting.style.display === 'none') {
        setting.style.display = 'block';
        user.style.display = 'none';
    } else {
        setting.style.display = 'none';
        user.style.display = 'block';
    }
}

function toggleUser() {
    var setting = document.getElementById('user-info-settings');
    var user = document.getElementById('user-info');
    if (setting.style.display === 'none') {
        setting.style.display = 'block';
        user.style.display = 'none';
    } else {
        setting.style.display = 'none';
        user.style.display = 'block';
    }
}
</script>

</body>
</html>
@endsection
