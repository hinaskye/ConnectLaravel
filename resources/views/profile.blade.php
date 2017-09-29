<!DOCTYPE html>
@extends('layouts.app')
<!-- Defining $User -->
<?php
  $user = Auth::user();
?>

@section('content')
<html>
<title>Connect Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--this css links gives the logo-->
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
          <legend class="text-white"><?php echo $user->firstname," ", $user->lastname; ?></legend>
          <p><i class="fa fa-user fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->gender; ?></p>
          <p><i class="fa fa-envelope fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->email; ?></p>
          <p><i class="fa fa-birthday-cake fa-fw margin-right-16 text-large text-grey"></i><?php
            $from = new DateTime($user->birthday);
            $to = new DateTime('today');
            echo $from->diff($to)->y, " years old";?></p>
          <p><i class="fa fa-user fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->gender; ?></p>
          <p><i class="fa fa-globe fa-fw margin-right-16 text-large text-grey"></i>Postcode, <?php echo $user->postcode; ?></p>
          <p><i class="fa fa-envelope fa-fw margin-right-16 text-large text-grey"></i><?php echo $user->email; ?></p>
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
          <!-- BEGIN EDIT PROFILE MODAL BUTTON -->
          <div class="container">
            <div class="row">
                  <p class="text-center"><a href="#" class="btn btn-primary display-inline pull-right" role="button" data-toggle="modal" data-target="#login-modal">Edit Profile Here</a></p>
            </div>
          </div>
          <!-- END EDIT PROFILE MODAL BUTTON -->
          <legend>
          	<h3 class="display-inline-block margin-top-10">About Me</h3>
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
            <br>
            <hr>
        </div>

      </div>

  </div>
  <!-- End Right Column -->

    </div>
  <!-- End Grid -->

</div>
<!-- End Page Container -->




<!-- BEGIN EDIT PROFILE MODAL POPUP -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">

            <!-- BEGIN INSERT YOUR CODE HERE FOR IMAGE UPLOAD FUNCTION CHING  -->
          <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
            <!-- END INSERT YOUR CODE HERE FOR IMAGE UPLOAD FUNCTION CHING  -->


          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>

                <!-- Begin edit user profile form-->
                <div class="container">
                    <form method="POST" action=""  id="login-form">
                    {{csrf_field()}}
                      <fieldset>
		                <div class="modal-body">

                      <legend>Edit User Details</legend>



                      <div class="form-group">
                        <label for="firstname" class="col-lg-2 control-label">First Name</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}" placeholder='<?php echo $user->firstname ?>'>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="lastname" class="col-lg-2 control-label">Last Name</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}" placeholder='<?php echo $user->lastname ?>'>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="username" class="col-lg-2 control-label">Username</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder='<?php echo $user->username ?>'>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-lg-2 ">Gender</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="gender">
                              <option value="male" name="gender">Male</option>
                              <option value="female" name="gender">Female</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="birthday" class="col-lg-2 control-label">Birthday</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail" name="email" value="{{old('email')}}" placeholder='<?php echo $user->email ?>'>
                        </div>
                      </div>
                    <br>

                    <legend>Edit User Preferences/Questions</legend>

                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">What your favourite movie genre?</label>
                        <div class="col-lg-10">
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
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Do you consider yourself an active person?</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="q2">
                                <option value="1" name="q2">Active</option>
                                <option value="2" name="q2">Moderate</option>
                                <option value="3" name="q2">Couch Potato</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Would you rather stay at home, or go out with your Friends?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q3">
                              <option value="1" name="q3">Stay at home</option>
                              <option value="2" name="q3">Go out with friends</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Do you have a good sense of humour?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q4">
                              <option value="1" name="q4">Of course!</option>
                              <option value="2" name="q4">Not at all!</option>
                          </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-2 control-label">Do you prefer to eat out or cook at home?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q5">
                              <option value="1" name="q5">Eat out</option>
                              <option value="2" name="q5">Cook at home</option>
                          </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-lg-2 control-label">Do you like animals?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q6">
                              <option value="1" name="q6">Yes</option>
                              <option value="2" name="q6">No</option>
                              <option value="3" name="q6">Neither</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Do you play a musical instrument?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q7">
                              <option value="1" name="q7">Yes</option>
                              <option value="2" name="q7">No</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Would you admit to a mistake?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q8">
                              <option value="1" name="q8">Yes</option>
                              <option value="2" name="q8">No</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Do you enjoy reading?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q9">
                              <option value="1" name="q9">Yes</option>
                              <option value="2" name="q9">No</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Do you believe in fate?</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="q10">
                              <option value="1" name="q10">Yes</option>
                              <option value="2" name="q10">No</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="aboutme" class="col-lg-2 control-label">About Me</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="aboutme" placeholder="<?php echo $user->aboutme;?>"></textarea>
                            </div>
                    </div>

                    <button id="Submitbtn" type="submit" class="btn btn-primary pull-right">Update!!</button>
                      </fieldset>
                    </form>
                  </div>
                <!-- End edit user form -->
			</div>
		</div>
	</div>
    <!-- END EDIT PROFILE MODAL POPUP  -->

</body>
</html>
@endsection
