<?php

use App\Livewire\Sms\Message;
use Livewire\Volt\Component;

new class extends Component
{
    public Message $msg;
}

?>

<div wire:poll.5s>

    @if($n == 1)
    @foreach($mess as $msg)
    @foreach($team as $teams)
    @if($teams->auth_id == Auth::user()->id && $msg->auth_id == Auth::user()->id && $teams->status == "true" && $msg->team_id == $teams->id)

    <div style="text-align:right;border-radius:0.5em;width:max auto;">
        <b class="text-right bg-success" style="padding:5px;"> {{$msg->message}}</b>
    </div>
    <br>
    <div style="text-align: right;">{{$msg->created_at->diffForHumans()}}</div>
    <br>
    @else
    @if($teams->auth_id == Auth::user()->id && $msg->auth_id != Auth::user()->id && $teams->status == "true" && $msg->team_id == $teams->id)
    @foreach($user as $users)
    @if($msg->auth_id == $users->id)
    <div style="text-align: left;width:max">
        <b class="bg-dark text-white">{{$users->name}} : {{$msg->message}}</b>
    </div>
    <div style="text-align: left;">{{$msg->created_at->diffForHumans()}}</div>
    @endif
    @endforeach

    <br>
    @endif
    @endif
    @endforeach
    @endforeach
    @endif


    @if($e == 1)
    @foreach($mess as $msg)
    @foreach($_team as $_teams)
    @if($_teams->user_id == Auth::user()->id && $msg->auth_id == Auth::user()->id && $_teams->activate == "true" && $msg->team_id == $_teams->team_id)

    <div style="text-align:right;border-radius:0.5em;width:max auto;">
        <b class="text-right bg-success" style="padding:5px;"> {{$msg->message}}</b>
    </div>
    <br>
    <div style="text-align: right;">{{$msg->created_at->diffForHumans()}}</div>
    <br>
    @else
    @if($_teams->user_id == Auth::user()->id && $msg->auth_id != Auth::user()->id && $_teams->activate == "true" && $msg->team_id == $_teams->team_id)
    @foreach($user as $users)
    @if($msg->auth_id == $users->id)

    <div style="text-align: left;width:max">
        <b class="bg-dark text-white" style="padding:5px;">{{$users->name}} : {{$msg->message}}</b>
    </div>
    <div style="text-align: left;">{{$msg->created_at->diffForHumans()}} </div>
    @endif
    @endforeach

    <br>
    @endif
    @endif
    @endforeach
    @endforeach
    @endif
    <form wire:submit="texto">
        <input type="text" name="" id="" wire:model="text" placeholder="Votre message">
        <x-input-error :messages="$errors->get('text')" class="mt-2" />
        <br>
        <button>
            Envoyer
        </button>
    </form>
</div>