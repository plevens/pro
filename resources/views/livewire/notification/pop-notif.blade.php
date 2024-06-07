<?php

use App\Livewire\Notification\PopNotif;
use Livewire\Volt\Component;

new class extends Component
{
    public PopNotif $notification;
}

?>

<div wire:poll.5s>
    @php
    $p = 0;
    @endphp
    @foreach($team_notif as $notification)
    @if($notification->user_id == Auth::user()->id)
    @php
    $p++;
    @endphp
    @endif
    @endforeach

    @if($p == 0)

    @else
    <b style="background-color:red;padding:1px 5px ; border-radius:50%;margin-left:-15px;font-size:10px;color:white">
        @if($p > 9)
        +9
        @else
        {{$p}}
        @endif
    </b>
    @endif
</div>