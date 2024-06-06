<?php

use App\Livewire\Sms\Message;
use Livewire\Volt\Component;

new class extends Component
{
    public Message $msg;
}

?>

<div wire:poll.5s>
    @foreach($game as $keys)
    @foreach($sms as $key)
    @foreach($user as $used)
    @if($used->id == $key->auth_id && $keys->id == $key->team_id && $keys->status == 'true' && $key->auth_id == $auth_id)
    <br>
    Vous : {{$key->message}}
    @endif
    @if($used->id == $key->auth_id && $key->team_id == $keys->id && $keys->status == 'true' && $key->auth_id != $auth_id)
    <br>
    {{$used->name}} : {{$key->message}}
    @endif
    @endforeach
    @endforeach
    @endforeach
    <form wire:submit="texto">
        <textarea wire:model="text" name="text" id="" cols="10" rows="1"></textarea>
        <x-input-error :messages="$errors->get('text')" class="mt-2" />
        <br>
        <button>
            Envoyer
        </button>
    </form>
</div>