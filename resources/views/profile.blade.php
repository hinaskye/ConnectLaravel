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
			    	<option >Male</option>
			    	<option>Female</option>
			    </select>
			  </div>
			  <div class="setting-input">
			    <span><i class="fa fa-envelope fa-fw margin-right-16 text-large text-grey"></i></span>
			    <input type="text" placeholder="Email Address">
			  </div>
			  <div class="setting-input">
			    <span><i class="fa fa-birthday-cake fa-fw margin-right-16 text-large text-grey"></i></span>
			    <input type="date" placeholder="birthday">
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
          	<h3 class="display-inline margin-top-10">About Me</h3>
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
          	<h3 class="display-inline">About Me</h3>
          	<a class="btn  display-inline pull-right" href="#"  onclick="toggleUser()"><i class="fa fa-times fa-fw margin-right-16 text-large text-grey"></i></a>
          </legend>
          <input type="text" placeholder="About Me">
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
