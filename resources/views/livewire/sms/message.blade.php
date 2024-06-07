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
    vous : {{$msg->message}}
    <br>
    @else
    @if($teams->auth_id == Auth::user()->id && $msg->auth_id != Auth::user()->id && $teams->status == "true" && $msg->team_id == $teams->id)
    @foreach($user as $users)
    @if($msg->auth_id == $users->id)
    {{$users->name}} :
    @endif
    @endforeach
    {{$msg->message}}
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
    vous : {{$msg->message}}
    <br>
    @else
    @if($_teams->user_id == Auth::user()->id && $msg->auth_id != Auth::user()->id && $_teams->activate == "true" && $msg->team_id == $_teams->team_id)
    @foreach($user as $users)
    @if($msg->auth_id == $users->id)
    {{$users->name}} :
    @endif
    @endforeach
    {{$msg->message}}
    <br>
    @endif
    @endif
    @endforeach
    @endforeach
    @endif
    <form wire:submit="texto">
        <textarea wire:model="text" name="text" id="" cols="10" rows="1"></textarea>
        <x-input-error :messages="$errors->get('text')" class="mt-2" />
        <br>
        <button>
            Envoyer
        </button>
    </form>
</div>