<!DOCTYPE html>
<div class="cont">
@extends('layouts.app')
@section('content')
<!-- Defining $User -->
<?php
  $user = Auth::user();
  $userID = $user->id;
  $key = $userID;
  $file['url']= 'https://s3-ap-southeast-2.amazonaws.com/profile.pictures.pp'.'/'.$key;
?>


<html>
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
                    <img src="{!! $file['url'] !!}" onerror="imgError(this);" width="100%" height="300em" style="border-radius: 3em; margin-top:1em;">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <br>
            <legend class="text-white"><?php echo $user->firstname," ", $user->lastname; ?></legend>
            <p><i class="fa fa-user fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->gender; ?></p>
            <p><i class="fa fa-envelope fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->email; ?></p>
            <p><i class="fa fa-birthday-cake fa-fw margin-right-16 text-large text-grey"></i><?php
              $from = new DateTime($user->birthday);
              $to = new DateTime('today');
              echo $user->birthday, " (", $from->diff($to)->y, " years old)";?></p>
              <p><i class="fa fa-globe fa-fw margin-right-16 text-large text-grey"></i>Postcode, <?php echo $user->postcode; ?></p>
            <hr>
            <br>
          </div>
        </div>
      </div>
    <!-- End Left Column -->

<!-- First Right Column -->
<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
    <div class="col-lg-12 col-md-12">
      <legend class="text-white"><h3 class="display-inline-block margin-top-10">About Me
        <!-- BEGIN EDIT PROFILE MODAL BUTTON -->
        <a id="editbtn" href="#" class="btn btn-primary display-inline pull-right" role="button" data-toggle="modal" data-target="#login-modal">Edit Profile Here</a>
        <!-- END EDIT PROFILE MODAL BUTTON -->
        <!-- BEGIN EDIT PROFILE PICTURE BUTTON -->
        <a id="editbtn" href="/editImage" class="btn btn-primary display-inline pull-right" role="button">Edit Profile Picture Here</a>
        <!-- END EDIT PROFILE PICTURE BUTTON -->
      </h3></legend>
      <p><?php echo $user->aboutme; ?></p>
        <br>
      <hr>
    </div>
  </div>
</div>
<!-- End First Right Column -->

      <!-- Second Right Column -->
      <div id="user-info" class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">

            <legend class="text-white"><h3>My Questions/Preferences</h3></legend>

            <h4><b>Favourite Movie Genre</b></h4>
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

        <h4><b>I am looking for</b></h4>
        <p><?php  if ($user->looking == "male")
          {
          echo "male.";
        } elseif ($user->looking == "female")
          {
          echo "female.";
        } elseif ($user->looking =="both")
        {
          echo "both male & female.";
        }
          ?></p><br>

        <h4><b>My Level of Education is</b></h4>
        <p><?php  if ($user->myedu == "Highschool")
          {
          echo "High School";
        } elseif ($user->myedu == "University")
          {
          echo "University";
        } elseif ($user->myedu =="Masters")
        {
          echo "Masters";
        } elseif ($user->myedu =="PHD")
        {
          echo "PHD";
        }
          ?></p><br>

          <h4><b>Education of my ideal match is</b></h4>
          <p><?php  if ($user->matchingedu == "Highschool")
            {
            echo "High School";
          } elseif ($user->matchingedu == "University")
            {
            echo "University";
          } elseif ($user->matchingedu =="Masters")
          {
            echo "Masters";
          } elseif ($user->matchingedu =="PHD")
          {
            echo "PHD";
          }
            ?></p><br>

            <h4><b>My activity level...</b></h4>
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

            <h4><b>Stay at home or go out?</b></h4>
            <p><?php  if ($user->q3 == "1")
              {
              echo "Stay at home!";
              } elseif ($user->q3 == "2")
              {
              echo "Go out with friends!";
              }
              ?></p><br>

            <h4><b>Am I funny?</b></h4>
            <p><?php  if ($user->q4 == "1")
              {
              echo "Of course!";
              } elseif ($user->q4 == "2")
              {
              echo "Not really :(";
              }
              ?></p><br>

            <h4><b>Eat out or at home?</b></h4>
            <p>I like to <?php  if ($user->q5 == "1")
              {
              echo "eat out.";
              } elseif ($user->q5 == "2")
              {
              echo "cook at home.";
              }
              ?></p><br>

            <h4><b>Animal lover?</b></h4>
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

            <h4><b>Play a musical instrument?</b></h4>
            <p><?php  if ($user->q7 == "1")
              {
              echo "Hell yeah!";
              } elseif ($user->q7 == "2")
              {
              echo "Nope!!!";
              }
              ?></p><br>

            <h4><b>Do you admit mistakes?</b></h4>
            <p><?php  if ($user->q8 == "1")
              {
              echo "Yep";
              } elseif ($user->q8 == "2")
              {
              echo "Nope!!!";
              }
              ?></p><br>

            <h4><b>Like reading?</b></h4>
            <p><?php  if ($user->q9 == "1")
              {
              echo "Yep, books are awesome!";
              } elseif ($user->q9 == "2")
              {
              echo "Nope, reading isn't for me";
              }
              ?></p><br>

            <h4><b>Do I believe in fate??</b></h4>
            <p><?php  if ($user->q10 == "1")
              {
              echo "Yeah, I am waiting for the one <3";
              } elseif ($user->q10 == "2")
              {
              echo "No, who believes in that make believe?";
              }
              ?></p>
              <hr>

        </div>

    </div>
    <!-- End Second Right Column -->

      </div>
    <!-- End Grid -->

  </div>
  <!-- End Page Container -->


  <!-- BEGIN EDIT PROFILE MODAL POPUP -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      	<div class="modal-dialog">
  			<div class="modal-content">

                  <!-- Begin edit user profile form-->
          <div class="container">
            <div class="col-md-6">
              <div class="form-area">
                <form role="form" name="editForm" method="POST" action="">
                  {{csrf_field()}}
                  <br style="clear:both">

                  <fieldset>
          <legend>Edit User Details<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></legend>

          <div class="form-group">
            <label for="firstname">First Name</label>
              <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}" placeholder='<?php echo $user->firstname ?>'>
          </div>

          <div class="form-group">
            <label for="lastname">Last Name</label>
              <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}" placeholder='<?php echo $user->lastname ?>'>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder='<?php echo $user->username ?>'>
        </div>

          <div class="form-group">
            <label for="gender">Gender</label>
              <select class="form-control" name="gender">
                  <option value="male" name="gender">Male</option>
                  <option value="female" name="gender">Female</option>
              </select>
          </div>

          <div class="form-group">
            <label for="birthday">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}" placeholder='<?php echo $user->birthday ?>'>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="inputEmail" name="email" value="{{old('email')}}" placeholder='<?php echo $user->email ?>'>
          </div>

        <br>

        <legend>Edit User Preferences/Questions</legend>

        <div class="form-group">
            <label>I am looking for</label>
                <select class="form-control" name="looking">
                    <option value="male" name="looking">Male</option>
                    <option value="female" name="looking">Female</option>
                    <option value="both" name="looking">both</option>
                </select>
        </div>

        <div class="form-group">
            <label for="select">My Level of Education</label>
                <select class="form-control" name="myedu">
                    <option value="Highschool" name="myedu">High School</option>
                    <option value="University" name="myedu">University</option>
                    <option value="Masters" name="myedu">Masters</option>
                    <option value="PHD" name="myedu">PHD</option>
                </select>
        </div>

        <div class="form-group">
            <label for="select">Education of your ideal match</label>
                <select class="form-control" name="matchingedu">
                    <option value="Highschool" name="matchingedu">High School</option>
                    <option value="University" name="matchingedu">University</option>
                    <option value="Masters" name="matchingedu">Masters</option>
                    <option value="PHD" name="matchingedu">PHD</option>
                </select>
        </div>


        <div class="form-group">
            <label>What your favourite movie genre?</label>
                <select class="form-control" name="q1">
                    <option value="1" name="q1">Action</option>
                    <option value="2" name="q1">Romance</option>
                    <option value="3" name="q1">Comedy</option>
                    <option value="4" name="q1">Horror</option>
                    <option value="5" name="q1">Thriller</option>
                    <option value="6" name="q1">Sci-Fi</option>
                    <option value="7" name="q1">Disney</option>
                </select>
        </div>

        <div class="form-group">
            <label>Do you consider yourself an active person?</label>
                <select class="form-control" name="q2">
                    <option value="1" name="q2">Active</option>
                    <option value="2" name="q2">Moderate</option>
                    <option value="3" name="q2">Couch Potato</option>
                </select>
        </div>

        <div class="form-group">
            <label>Would you rather stay at home, or go out with your Friends?</label>
              <select class="form-control" name="q3">
                  <option value="1" name="q3">Stay at home</option>
                  <option value="2" name="q3">Go out with friends</option>
              </select>
        </div>

        <div class="form-group">
            <label>Do you have a good sense of humour?</label>
              <select class="form-control" name="q4">
                  <option value="1" name="q4">Of course!</option>
                  <option value="2" name="q4">Not at all!</option>
              </select>
        </div>


        <div class="form-group">
            <label>Do you prefer to eat out or cook at home?</label>
              <select class="form-control" name="q5">
                  <option value="1" name="q5">Eat out</option>
                  <option value="2" name="q5">Cook at home</option>
              </select>
        </div>



        <div class="form-group">
            <label>Do you like animals?</label>
              <select class="form-control" name="q6">
                  <option value="1" name="q6">Yes</option>
                  <option value="2" name="q6">No</option>
                  <option value="3" name="q6">Neither</option>
              </select>
        </div>

        <div class="form-group">
            <label>Do you play a musical instrument?</label>
              <select class="form-control" name="q7">
                  <option value="1" name="q7">Yes</option>
                  <option value="2" name="q7">No</option>
              </select>
        </div>

        <div class="form-group">
            <label>Would you admit to a mistake?</label>
              <select class="form-control" name="q8">
                  <option value="1" name="q8">Yes</option>
                  <option value="2" name="q8">No</option>
              </select>
        </div>

        <div class="form-group">
            <label>Do you enjoy reading?</label>
              <select class="form-control" name="q9">
                  <option value="1" name="q9">Yes</option>
                  <option value="2" name="q9">No</option>
              </select>
        </div>

        <div class="form-group">
            <label>Do you believe in fate?</label>
              <select class="form-control" name="q10">
                  <option value="1" name="q10">Yes</option>
                  <option value="2" name="q10">No</option>
              </select>
        </div>

        <div class="form-group">
                <label for="aboutme">About Me</label>
                    <textarea class="form-control" name="aboutme" placeholder="<?php echo $user->aboutme;?>"></textarea>
        </div>

        <div class="form-group">
            <label for="postcode">PostCode</label>
                <input type="text" class="form-control" name="postcode" value="{{old('postcode')}}" placeholder="Enter Postcode...">
        </div>

        <button id="Submitbtn" type="submit" class="btn btn-primary pull-right">Update!!</button>
          </fieldset>
          </form>
      </div>
    </div>
  </div>
                  <!-- End edit user form -->
  			</div>
  		</div>
  	</div>
      <!-- END EDIT PROFILE MODAL POPUP  -->



</body>
</html>
</div>
@endsection
