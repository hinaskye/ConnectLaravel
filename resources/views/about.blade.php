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
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
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


    </div>

      <!-- <div class="container w3-card-2 w3-white w3-margin-bottom"> -->
        <div class="ccontainer">

        <div class="w3-container">
          <h3 class="w3-opacity"><b>About Connect</b></h3><hr>
          <p>The main objective of project connect is to find a person's soulmate by linking
              them to compatible people and facilitate the connecting of the two. <br><br>

              In order to accomplish the perfect matching and successfully connect compatible
              couples together, the development team will be using a unique algorithm which will
              be different from any other known dating competitors that are currently available. <br><br>

              Connect will not just be a service that runs on desktops but will also be compatible
              with mobile devices, which will increase traffic to the application as well as providing
              the flexibility of a different means of access to the service.<br><br>

              Due to the fact that this project will be an agile SCRUM project, the development team
              will consist of five members, including a SCRUM Master (Rhys Ellwood) from RMIT University.
              The project’s  expected duration will be running for twelve weeks and will commence on 21st
              of July 2017.<br><br>

              Connect will be programmed using Laravel, a PHP framework which will handle all the back-end
              coding logic and the front-end user interface will be designed using HTML, CSS, Bootstrap and
              Javascript. All team members are expected to have at least some basic knowledge about the programming
              languages stated and participate in coding the application so that every team member will have equal
              contribution for the project.<br>
            </p>
            <hr>
        </div>
      </div>
      <br>
      <!-- <div class="w3-container w3-card-2 w3-white w3-margin-bottom"> -->
      <div class="ccontainer">
        <div class="w3-container">
          <h3 class="w3-opacity"><b>Developers of Connect</b></h3><hr>
          <p>
            <h5 class="w3-opacity"><b>Rhys Ellwood</b></h5>
            <p> Hi my name is Rhys and I am Connect's scrum Master</p><br>
            <p><b>Student Number:</b> s3491191</p>
            <p><b>Roles:</b> Scrum Master, Designer, Developer, Tester</p>
            <hr>

            <h5 class="w3-opacity"><b>Michael Huynh</b></h5>
            <p> Hi my name is Michael and I am Connect's developer</p><br>
            <p><b>Student Number:</b> s3539352</p>
            <p><b>Roles:</b> Developer, Tester, Document Manager, Trello Board Manager</p>
            <hr>

            <h5 class="w3-opacity"><b>Ching Loo</b></h5>
            <p> Hi my name is Ching and I am Connect's developer</p><br>
            <p><b>Student Number:</b> s3557584</p>
            <p><b>Roles:</b> Developer, Tester</p>
            <hr>


            <h5 class="w3-opacity"><b>Hieu Ngo</b></h5>
            <p> Hi my name is Hieu and I am Connect's developer</p><br>
            <p><b>Student Number:</b> ss3502260</p>
            <p><b>Roles:</b> Developer, Debugger, Tester</p>
            <hr>

            <h5 class="w3-opacity"><b>Chan Hoe Teng</b></h5>
            <p> Hi my name is Phillip and I am Connect's developer</p><br>
            <p><b>Student Number:</b> s3536311</p>
            <p><b>Roles:</b> Developer, Debugger, Tester</p>
            </p><br>
            <hr>
        </div>
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
