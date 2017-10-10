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

  <!-- Right Column -->
  <div id="user-info" class="col-lg-8 col-md-8 col-sm-6 col-xs-12 animate-bottom">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-gray">

      <!-- Begin edit user profile picture -->
        <div class="col-md-5">
          <legend class="text-white"><h3>Edit User Profile Picture</h3></legend>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
               <img src="{!! $file['url'] !!}" onerror="imgError(this);" width="100%" height="300em" style="border-radius: 3em;">
               <hr>
            </div>
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
  <!-- End edit user profile picture -->
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
