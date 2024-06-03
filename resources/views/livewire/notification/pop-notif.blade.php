<?php

use App\Livewire\Notification\PopNotif;
use Livewire\Volt\Component;

new class extends Component
{
    public PopNotif $notification;
}

?>

<div>
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
    {{$p}}
</div>