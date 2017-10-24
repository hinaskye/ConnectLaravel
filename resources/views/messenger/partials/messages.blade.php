<div class="media">
    <a class="pull-left" href="#">
        <img src="https://s3-ap-southeast-2.amazonaws.com/profile.pictures.pp/{{ $message->user->id }}"
             alt="{{ $message->user->firstname }}" class="img-circle" width="64" height="64">
    </a>
    <div class="media-body background-div">
        <h5 class="media-heading">{{ $message->user->firstname }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>