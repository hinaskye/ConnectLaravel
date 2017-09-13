<!DOCTYPE html>
@extends('layouts.app')
<!-- <link href="{{ asset('css/profile.css') }}" rel="stylesheet"> -->
<!-- Defining $User -->
<?php
  $user = Auth::user();
?>
@section('content')
<html>
<title>Connect Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third">

      <div class="w3-white w3-text-grey w3-card-4 .slide-image">
        <div class="w3-display-container">
          <img src="https://i.ytimg.com/vi/2qZHh_iN5Zs/hqdefault.jpg" style="width:100%" alt="Avatar">

        </div>
        <div class="w3-container">
          <br>
          <legend><?php echo $user->firstname," ", $user->lastname; ?></legend>
          <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-grey"></i><?php echo $user->gender; ?></p>
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-grey"></i>RMIT Lecturer (Hard-Coded)</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-grey"></i>Melbourne, AU (Hard-Coded)</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-grey"></i><?php echo $user->email; ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-grey"></i>1800-333-000</p>
          <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-large w3-text-grey"></i><?php
            $from = new DateTime($user->birthday);
            $to = new DateTime('today');
            echo $from->diff($to)->y, " years old";?></p>
          <hr>
          <br>
        </div>
      </div>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">

      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <div class="w3-container">
          <legend><h3>About Me</h3></legend>
          <p><?php echo $user->aboutme; ?></p>
          <hr>
        </div>
        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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

        <div class="w3-container">
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





    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>


<footer class="w3-container footer-static-bottom w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>


</body>
</html>
@endsection
