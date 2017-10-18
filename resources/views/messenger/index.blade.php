@extends('layouts.master')

@section('content')
    @include('messenger.partials.flash')

    <div class= "background-div">
    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
	</div>
@stop