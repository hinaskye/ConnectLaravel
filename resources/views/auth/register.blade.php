<div class="style">
@extends('layouts.app')

@section('content')
    <title>Connect</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if(count($errors) > 0)
                @foreach ($errors->all() as $errors)
                    <p class="alert alert-danger">{{$errors}}</p>
                @endforeach
            @endif



            <form class="form-horizontal" action="{{route('auth.register')}}" method="post">
                {{csrf_field()}}
                <fieldset>
                    <div class="panel panel-default">

                    <div class="panel-body">
                      <legend>Registration</legend>


                    <div class="form-group">
                        <label for="firstname" class="col-lg-2 control-label">First Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-lg-2 control-label">Last Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-lg-2 control-label">Username</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Username">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail" name="email" value="{{old('email')}}" placeholder="Email">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Confirm Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" name="password_confirmation" placeholder="Password">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="birthday" class="col-lg-2 control-label">Birthday</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}" placeholder="YYYY-MM-DD">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-2 control-label">Gender</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="gender">
                              <option value="male" name="gender">Male</option>
                              <option value="female" name="gender">Female</option>
                          </select>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="panel-heading"> <legend>Questions</legend></div>

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

<legend></legend>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tell me more about you.</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="aboutme">
                        </div>
                    </div>

<legend></legend>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>

                </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
    <script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</div>
@endsection
