<?php

use App\Livewire\Team\MyTeam;
use Livewire\Volt\Component;

new class extends Component
{
    public MyTeam $team;
}

?>

<div wire:poll.5s>
    @foreach($team as $teams)
    @if($teams->auth_id == Auth::user()->id)
    @if(strlen($teams->icon) == 1)
    @else
    <input type="image" src="{{asset('storage/'.$teams->icon )}}" style="width:5cm;height:5cm;border-radius:50%" alt="">
    @endif
    <h1 style="text-transform: capitalize;">
        {{$teams->nom}}
    </h1>
    <br>
    <h3 id="Team_creer">Team creer le {{$teams->description}}</h3>
    <br>
    <h2 id="Membre">Membre {{$teams->membre}}</h2>
    @endif
    @endforeach
</div>