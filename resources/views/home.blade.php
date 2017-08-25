@extends('layouts.app')
<link href="{{ asset('css/homepage.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <h1>My Matches</h1><br>
    <div class="row">
        Filter to be implemented
    </div><br>

    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 1</h3>
            <p class="card-text">Age: 18</p>
        </div>
    </div>
    
    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 2</h3>
            <p class="card-text">Age: 20</p>
        </div>
    </div>
    
    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 3</h3>
            <p class="card-text">Age: 25</p>
        </div>
    </div>

    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 4</h3>
            <p class="card-text">Age: 23</p>
        </div>
    </div>

    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 5</h3>
            <p class="card-text">Age: 22</p>
        </div>
    </div>
    
    <div class="card col-md-4 col-sm-6">
        <p class="matchingPercent">90%</p>
        <img class="card-img-top" src="/images/blank-female-profile-user.png" width="100%" alt="Match Image">
        <div class="card-body">
            <h3 class="card-title">Stranger 6</h3>
            <p class="card-text">Age: 26</p>
        </div>
    </div>
</div>

@endsection