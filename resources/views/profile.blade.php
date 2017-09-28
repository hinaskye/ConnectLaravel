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
					<img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>

                <!-- Begin edit user profile form-->
                <div id="div-forms">
                    <form method="POST" action=""  id="login-form">
                    {{csrf_field()}}
                      <fieldset>
		                <div class="modal-body">

                      <div class="form-group">
                        <label class="col-lg-2 control-label">Gender</label>
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
                            <input type="text" class="form-control" id="inputEmail" name="email" value="{{old('email')}}" placeholder="Email">
                        </div>
                      </div>

                    <button type="submit" class="btn btn-primary">Update!</button>
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
