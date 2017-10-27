<!DOCTYPE html>
<div class="cont">
@extends('layouts.app')
@section('content')


<?php
  $key = $user->id;
  $file['url']= 'https://s3-ap-southeast-2.amazonaws.com/profile.pictures.pp'.'/'.$key;
  ?>

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
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 animate-left">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
          <img class="card-img-top" src="{!! $file['url'] !!}"  onerror="imgError(this);" width="100%" height="300em" alt="Match Image" style="border-radius: 3em; margin-top:1em;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <br>
          <legend class="text-white"><?php echo $user->firstname," ", $user->lastname; ?></legend>
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

    <!-- End Left Column -->
    </div>

    <!-- First Right Column -->
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">
        <div class="col-lg-12 col-md-12">
          <legend class="text-white"><h3 class="display-inline-block margin-top-10"><?php echo "About ", $user->firstname," ", $user->lastname; ?>
            <!-- BEGIN CHAT BUTTON -->
            <a href=<?php
            try {
              // Returns latest thread between auth user and matched user, else send to create message screen
              $thread = Cmgmyr\Messenger\Models\Thread::between([Auth::id(), $user->id])->latest('updated_at')->firstOrFail();
              echo "/messages/".$thread->id;
            } catch (Exception $e) {
              // Exception occurs when there is no thread that matches the above query
              echo "/messages/create";
            }?> 
            class="btn btn-success display-inline pull-right" role="button">Chat with me here!</a>
            <!-- END CHAT BUTTON -->
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

                <legend class="text-white"><h3><?php echo $user->firstname," ", $user->lastname,"'s ", "Answered Questions/Preferences" ?></h3></legend>

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
</div>

</body>
</html>
</div>
@endsection
