<div class="style">
@extends('layouts.app')

<!-- Defining $User -->
<?php
  $user = Auth::user();
?>

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Details:</div>

                <div class="panel-body">

                  <div class="card col-md-4 col-sm-6">
                      <p class="matchingPercent">Match Percent: 99%</p>
                      <img class="card-img-top" src="https://i.ytimg.com/vi/2qZHh_iN5Zs/hqdefault.jpg" width="100%" alt="Match Image">
                      <div class="card-body">
                          <h3 class="card-title"><?php echo $user->username; ?></h3>
                          <p class="card-text">Age: <?php echo $user->birthday; ?></p>
                          <p class="card-text">Gender: <?php echo $user->gender; ?> Lol jk, I'm actually the opposite :)</p>
                          <p class="card-text">Email: <?php echo $user->email; ?></p>
                          <p class="card-text">Mobile: 1800 333 000 Call me bby ;)</p>
                          <p class="card-text">About me: <?php echo $user->aboutme; ?></p>
                          <p class="card-text">Member since: <?php echo $user->created_at; ?></p>
                      </div>
                  </div>





                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection





  <!-- $user = Auth::user();
echo $user->username;

 echo $user->username;  -->
