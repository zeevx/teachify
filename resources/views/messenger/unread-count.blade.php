<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="alert-danger">{{ $count }}</span>
    @else
    <span class="alert-danger">0</span>
@endif
