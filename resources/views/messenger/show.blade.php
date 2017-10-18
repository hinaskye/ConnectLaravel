@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<h1>My Messages</h1>
		</div>
	</div>
	<div class="row">
	    <div class="col-md-6">
	        <h2>{{ $thread->subject }}</h2>
	        @each('messenger.partials.messages', $thread->messages, 'message')
	        @include('messenger.partials.form-message')
	    </div>
	</div>
</div>
@stop