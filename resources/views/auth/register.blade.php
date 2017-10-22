<div class="cont">
@extends('layouts.app')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">

@section('content')
    <title>Connect</title>

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
                        <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{old('firstname')}}" placeholder="First Name"
                            pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}" placeholder="Last Name"
                            pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Username">
                    </div>


                    <div class="form-group">
                        <label for="email" >Email</label>
                            <input type="text" class="form-control" id="inputEmail" name="email" value="{{old('email')}}" placeholder="Email"
                            pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
                    </div>


                    <div class="form-group">
                        <label for="password" >Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="password" >Confirm Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password_confirmation" placeholder="Password">
                    </div>


                    <div class="form-group">
                        <label for="birthday" >Birthday</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}" placeholder="YYYY-MM-DD"
                            pattern="^(1[8-9])[0-9]{2}-(0[1-9]|1[0-2])-(0[0-9]|[1-2][0-9]|(3[0-1]))">
                    </div>


                    <div class="form-group">
                        <label >Gender</label>
                          <select class="form-control" name="gender">
                              <option value="male" name="gender">Male</option>
                              <option value="female" name="gender">Female</option>
                          </select>
                    </div>

                        <div class="form-group">
                            <label >I am looking for</label>
                                <select class="form-control" name="looking">
                                    <option value="male" name="looking">Male</option>
                                    <option value="female" name="looking">Female</option>
                                    <option value="both" name="looking">both</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="select" >My Level of Education</label>
                                <select class="form-control" name="myedu">
                                    <option value="Highschool" name="myedu">High School</option>
                                    <option value="University" name="myedu">University</option>
                                    <option value="Masters" name="myedu">Masters</option>
                                    <option value="PHD" name="myedu">PHD</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="select" >Education of your ideal match</label>
                                <select class="form-control" name="matchingedu">
                                    <option value="Highschool" name="matchingedu">High School</option>
                                    <option value="University" name="matchingedu">University</option>
                                    <option value="Masters" name="matchingedu">Masters</option>
                                    <option value="PHD" name="matchingedu">PHD</option>
                                </select>
                        </div>



                    <br>
                    <br>
                    <div class="panel-heading"> <legend>Please answer the following preferences</legend></div>

                    <div class="form-group">
                        <label for="select" >What your favourite movie genre?</label>
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
                        <label >Do you consider yourself an active person?</label>
                            <select class="form-control" name="q2">
                                <option value="1" name="q2">Active</option>
                                <option value="2" name="q2">Moderate</option>
                                <option value="3" name="q2">Couch Potato</option>
                            </select>
                    </div>


                    <div class="form-group">
                        <label >Would you rather stay at home, or go out with your Friends?</label>
                          <select class="form-control" name="q3">
                              <option value="1" name="q3">Stay at home</option>
                              <option value="2" name="q3">Go out with friends</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label >Do you have a good sense of humour?</label>
                          <select class="form-control" name="q4">
                              <option value="1" name="q4">Of course!</option>
                              <option value="2" name="q4">Not at all!</option>
                          </select>
                    </div>


                    <div class="form-group">
                        <label >Do you prefer to eat out or cook at home?</label>
                          <select class="form-control" name="q5">
                              <option value="1" name="q5">Eat out</option>
                              <option value="2" name="q5">Cook at home</option>
                          </select>
                    </div>



                    <div class="form-group">
                        <label >Do you like animals?</label>
                          <select class="form-control" name="q6">
                              <option value="1" name="q6">Yes</option>
                              <option value="2" name="q6">No</option>
                              <option value="3" name="q6">Neither</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label >Do you play a musical instrument?</label>
                          <select class="form-control" name="q7">
                              <option value="1" name="q7">Yes</option>
                              <option value="2" name="q7">No</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label >Would you admit to a mistake?</label>
                          <select class="form-control" name="q8">
                              <option value="1" name="q8">Yes</option>
                              <option value="2" name="q8">No</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label >Do you enjoy reading?</label>
                          <select class="form-control" name="q9">
                              <option value="1" name="q9">Yes</option>
                              <option value="2" name="q9">No</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label >Do you believe in fate?</label>
                          <select class="form-control" name="q10">
                              <option value="1" name="q10">Yes</option>
                              <option value="2" name="q10">No</option>
                          </select>
                    </div>

                        <div class="form-group">
                            <label for="firstname" >About Me</label>
                                <input type="text" class="form-control" name="aboutme" value="{{old('aboutme')}}" placeholder="Tell us a bit about yourself">
                        </div>

                        <div class="form-group">
                            <label for="postcode" >PostCode</label>
                                <input type="text" class="form-control" name="postcode" value="{{old('postcode')}}" placeholder="Enter Postcode..."
                                pattern="^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$">
                        </div>


                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-md-offset-4 col-md-6">
                                {!! app('captcha')->display() !!}
                                {!! $errors->first('g-recaptcha-response', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>


                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" value="Register" class="btn btn-primary">Register</button>
                        </div>
                    </div>

                </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection
