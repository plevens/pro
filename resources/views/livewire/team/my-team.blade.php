<?php

use App\Livewire\Team\MyTeam;
use Livewire\Volt\Component;

new class extends Component
{
    public MyTeam $team;
}

?>

<div>
    @foreach($team as $teams)
    @if($teams->auth_id == Auth::user()->id)
    <h3 id="Team_creer">Team creer le {{$teams->description}}</h3>
    <br>
    <h2 id="Membre">Membre {{$teams->member}}</h2>
    @endif
    @endforeach
</div>