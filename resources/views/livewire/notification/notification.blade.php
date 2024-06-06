<?php

use App\Livewire\Notification\Notification;
use Livewire\Volt\Component;

new class extends Component
{
    public Notification $notification;
}

?>


<div wire:poll.5s>

    @foreach($team as $teams)
    @foreach($_team as $_teams)
    @if($teams->user_id == Auth::user()->id && $_teams->id == $teams->team_id)

    @if(strlen($_teams->icon) > 1)
    <input type="image" src="{{asset('storage/'.$_teams->icon)}}" alt="" width="50cm" height="50cm" style="border-radius:4em">
    @else
    <b style="padding: 2px 5px ; background-color:black;color:aliceblue;border-radius:4em">{{$_teams->icon}}</b>
    @endif
    {{$_teams->nom}} team vous demande de rejoindre son equipe.
    <br>
    <a href="{{route('accepte.team',['id'=>$teams->id])}}" class="btn btn-primary" wire:navigate>Accepter</a>
    <a href="{{route('exit.team',['id'=>$teams->id])}}" class="btn btn-danger" wire:navigate>refuser</a>
    @endif
    @endforeach
    @endforeach

</div>