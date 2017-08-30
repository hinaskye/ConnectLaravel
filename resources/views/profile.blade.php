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
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

      <div class="w3-white w3-text-grey w3-card-4">
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
          <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-large w3-text-grey"></i><?php echo $user->birthday; ?></p>
          <hr>
          <br>
        </div>
      </div>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">

      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-grey"></i>About Me</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>About me</b></h5>
          <p><?php echo $user->aboutme; ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Movies I Like</b></h5>
          <p><?php echo $user->q1,", ",$user->q2,", ",$user->q3,", ",$user->q4," " ;  ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>My Hobbies</b></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
        </div>
      </div>

      <div class="w3-container w3-card-2 w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-grey"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
          <h6 class="w3-text-grey"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p>Web Development! All I need to know in one place</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>RMIT University </b></h5>
          <h6 class="w3-text-grey"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
          <p>Masters Degree</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>RMIT University</b></h5>
          <h6 class="w3-text-grey"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
          <p>Bachelor Degree</p><br>
        </div>
      </div>

    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>


<footer class="w3-container footer w3-center w3-margin-top">
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
