<div class="container">
    <div class="row">
        <h1>My Messages</h1>
    </div>
@if (Session::has('error_message'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error_message') }}
    </div>
@endif