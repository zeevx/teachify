<?php $class = $thread->isUnread(Auth::id()) ? 'alert-success' : ''; ?>

<div class="m-2 media alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
    </h4>
    <p class="pl-2">
         Last Message: {{ $thread->latestMessage->body }}
    </p>
{{--    <p>--}}
{{--        <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>--}}
{{--    </p>--}}
{{--    <p>--}}
{{--        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>--}}
{{--    </p>--}}
</div>
