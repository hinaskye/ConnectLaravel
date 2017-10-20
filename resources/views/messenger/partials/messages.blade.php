<?php
$user = Auth::user();   /*This line is temporary to show the icon pictures, change this later to dynamic*/
  $key = $user->id;
  $file['url']= 'https://s3-ap-southeast-2.amazonaws.com/profile.pictures.pp'.'/'.$key;
  ?>


<div class="media">
    <a class="pull-left" href="#">

      <img src="{!! $file['url'] !!}"
                alt="Match Image" class="img-circle" width="64px" height="64px">
        <!-- <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
             alt="{{ $message->user->name }}" class="img-circle"> -->
    </a>
    <div class="media-body background-div">
        <h5 class="media-heading">{{$message->user->firstname}} {{$message->user->lastname}}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
