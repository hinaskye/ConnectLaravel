<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>


<div class="container">
    <div class="row">
        <div class="media alert {{ $class }} background-div">
            <h4 class="media-heading">
                <a class="color-white" href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
                ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
            <p>
                {{ $thread->latestMessage->body }}
            </p>
            <p>
                <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>
            </p>
            <p>
                <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
            </p>
        </div>
    </div>
</div>