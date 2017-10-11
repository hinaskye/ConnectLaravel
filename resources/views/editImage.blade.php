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
<link href="{{ asset('css/editImage.css') }}" rel="stylesheet">
<body>

<!-- Page Container -->
<div class="container">

  <!-- The Grid -->
  <div class="row">

    <!-- Left Column -->
    <div id="user-profile" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 animate-left">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
          <legend class="text-white"><h3>Edit User Profile Picture</h3></legend>

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
                  <img src="{!! $file['url'] !!}" onerror="imgError(this);" width="100%" height="300em" style="border-radius: 3em;">
             </div>

              <legend class="text-white"><?php echo $user->firstname," ", $user->lastname; ?></legend>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
        @endif

      <form action="{{ url('editImage') }}" name="submitImage" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-12">
            <input type="file" name="image" />
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-success">Upload</button><p class="text-center"><a href="/profile" class="btn btn-primary display-inline pull-right" role="button">Cancel</a></p>
          </div>
        </div>
      </form>
        </div>
      </div>
    </div>
  <!-- End Left Column -->



  <!-- Right Column -->
  <div id="user-info" class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
      <div class="col-lg-12 col-md-12">

        <legend class="text-white"><h3 class="display-inline-block margin-top-10">About Me</h3></legend>


        <p><?php echo $user->aboutme; ?></p>
        <hr>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <legend class="text-white"><h3>Questions I answered...</h3></legend>

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
      <h4><li>I am looking for </li></h4>
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
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h4><li>My level of education is</li></h4>
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
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h4><li>Education of my ideal match is</li></h4>
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

</body>
</html>
</div>
@endsection

<script type="text/javascript">
  function imgError(image) {
    image.onerror = "";
    image.src = "/images/profile.jpg";
    return true;
}
</script>
