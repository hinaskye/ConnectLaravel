
@extends('layouts.app')
<!-- <link href="{{ asset('css/profile.css') }}" rel="stylesheet"> -->
<!-- Defining $User -->
<?php
  $user = Auth::user();
?>

@section('content')
<!-- TESTING TEMPLATE -->

<!DOCTYPE html>
<html>
<title>Connect Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>RMIT Lecturer</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Melbourne, AU</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $user->email; ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1800-333-000</p>
          <hr>
          <br>
        </div>
      </div>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">

      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>About Me</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>About me</b></h5>
          <p><?php echo $user->aboutme; ?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Movies I Like</b></h5>
          <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>My Hobbies</b></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
        </div>
      </div>

      <div class="w3-container w3-card-2 w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>W3Schools.com</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Forever</h6>
          <p>Web Development! All I need to know in one place</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>RMIT University </b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
          <p>Masters Degree</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>RMIT University</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
          <p>Bachelor Degree</p><br>
        </div>
      </div>

    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>



</body>
</html>




<!-- Break used to hide original template from live site for now, remove later -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<!-- ORIGINAL -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel-body">

                  <div class="card col-md-4 col-sm-6">
                      <img class="card-img-top" src="https://i.ytimg.com/vi/2qZHh_iN5Zs/hqdefault.jpg" width="100%" alt="Match Image">
                      <div class="card-body">
                          <h3 class="card-title"><?php echo $user->username; ?></h3>
                          <p class="card-text">Age: <?php echo $user->birthday; ?></p>
                          <p class="card-text">Gender: <?php echo $user->gender; ?> Lol jk, I'm actually the opposite :)</p>
                          <p class="card-text">Email: <?php echo $user->email; ?></p>
                          <p class="card-text">Mobile: 1800 333 000 Call me bby ;)</p>
                          <p class="card-text">Credit Card Number: 1800 2678 4329 3465</p>
                          <p class="card-text">About me: <?php echo $user->aboutme; ?></p>
                          <p class="card-text">Member since: <?php echo $user->created_at; ?></p>
                      </div>
                  </div>
                </div>
        </div>
    </div>
</div>
@endsection
