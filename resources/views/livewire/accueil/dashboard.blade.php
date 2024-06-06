<?php

use App\Livewire\Accueil\Dashboard;
use Livewire\Volt\Component;

new class extends Component
{
    public Dashboard $__teams;
}

?>
<div wire:poll.5s>
    Utilisateurs <br>
    @foreach($team as $user)
    @if($user->id != Auth::user()->id)
    <b>A propos de </b> <b style="text-transform: capitalize;"> {{$user->name}}</b>
    <br>

    @endif
    @endforeach

</div>