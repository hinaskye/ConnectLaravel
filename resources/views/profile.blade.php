<div class="style">
@extends('layouts.app')


<!-- // $servername = "connectdb.ckktlmrdu53g.ap-southeast-2.rds.amazonaws.com";
// $username = "ConnectAdmin";
// $password = "password";
// $dbname = "UserDB";
//
// // Create Connnection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check Connnection
// if ($conn->connect_error)
//   {
//     die("Connection failed: " . $conn->connect_error);
//   } -->

<!-- // $sql = "SELECT firstname, lastname FROM UserDB";
// $result = $conn->query($sql);
//
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         // echo "- Name:". $row["firstname"];
//     }
// } else {
//     echo "0 results";
// }
//
// $conn->close(); -->


<?php
  use Illuminate\Support\Facades\Auth;
  $user = Auth::user();
echo $user->username;
?>

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USer Details:</div>

                <div class="panel-body">

                  <div class="card col-md-4 col-sm-6">
                      <p class="matchingPercent">99%</p>
                      <img class="card-img-top" src="https://i.ytimg.com/vi/2qZHh_iN5Zs/hqdefault.jpg" width="100%" alt="Match Image">
                      <div class="card-body">
                          <h3 class="card-title"><?php echo $user->username; ?></h3>
                          <p class="card-text">Age: 12</p>
                      </div>
                  </div>





                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
