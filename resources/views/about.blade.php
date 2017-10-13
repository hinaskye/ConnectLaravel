<!DOCTYPE html>
<div class="cont">
@extends('layouts.app')
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
    <!-- First Column -->
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
        <div class="col-lg-12 col-md-12">
          <legend class="white-text"><h3>About Connect</h3></legend>
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
            <br>
          <hr>
        </div>
      </div>
    </div>
    <!-- End First Column -->

    <!-- Second Column -->
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
        <div class="col-lg-12 col-md-12">
          <legend class="white-text"><h3>Developers of Connect</h3></legend>
          <p>
            <h5><b>Rhys Ellwood</b></h5>
            <p> Hi my name is Rhys and I am Connect's scrum Master</p><br>
            <p><b>Student Number:</b> s3491191</p>
            <p><b>Roles:</b> Scrum Master, Designer, Developer, Tester</p>
            <hr>

            <h5><b>Michael Huynh</b></h5>
            <p> Hi my name is Michael and I am Connect's developer</p><br>
            <p><b>Student Number:</b> s3539352</p>
            <p><b>Roles:</b> Developer, Tester, Document Manager, Trello Board Manager</p>
            <hr>

            <h5><b>Ching Loo</b></h5>
            <p> Hi my name is Ching and I am Connect's developer</p><br>
            <p><b>Student Number:</b> s3557584</p>
            <p><b>Roles:</b> Developer, Tester</p>
            <hr>


            <h5><b>Hieu Ngo</b></h5>
            <p> Hi my name is Hieu and I am Connect's developer</p><br>
            <p><b>Student Number:</b> ss3502260</p>
            <p><b>Roles:</b> Developer, Debugger, Tester, Github Manager</p>
            <hr>

            <h5><b>Chan Hoe Teng</b></h5>
            <p> Hi my name is Philip and I am Connect's developer</p><br>
            <p><b>Student Number:</b> s3536311</p>
            <p><b>Roles:</b> Developer, Debugger, Tester</p>
            </p><br>
            <hr>
            <br>
        </div>
      </div>
    </div>
    <!-- End Second Column -->

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>

</body>
</html>
</div>
@endsection
