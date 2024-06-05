<?php

use App\Livewire\Accueil\Dashboard;
use Livewire\Volt\Component;

new class extends Component
{
    public Dashboard $__teams;
}

?>
<div wire:poll.5s>
    les teams que vous pouvez joindre .
    <br>
    @php
    $i = 0;
    @endphp
    @foreach($team as $_teams)
    @if($_teams->auth_id == Auth::user()->id)
    @php
    $i++;
    @endphp
    @endif
    @endforeach


    @if($i >= 1)
    @foreach($team as $teams)
    @if($teams->auth_id != Auth::user()->id)
    <div style="display: inline-block;">
        @if(strlen($teams->icon) == 1)
        <b style="background-color:aquamarine;font-weight:bold;">{{$teams->icon}}</b>
        <br>
        @else
        <img src="{{asset('storage/'.$teams->icon)}}" alt="" style="border-radius:4em" srcset="" width="50cm" height="50cm">
        @endif
        {{$teams->nom}}
        <br>
        <b>Membre(s) ({{$teams->membre }})</b>
        <br>
        Ajouter
    </div>
    @else

    @endif
    @endforeach
    @endif



    @foreach($team_add as $team_adds)
    @if($team_adds->user_id == Auth::user()->id)
    @foreach($team as $teams)

    @if($team_adds->user_id == Auth::user()->id && $teams->id == $team_adds->team_id || $team_adds->user_id != Auth::user()->id && $teams->id == $team_adds->team_id )

    @else
    @if($teams->auth_id != Auth::user()->id)
    <div style="display: inline-block;text-align:center">
        @if(strlen($teams->icon) == 1)
        <b style="background-color:aquamarine;font-weight:bold;">{{$teams->icon}}</b>
        <br>
        @else
        <img src="{{asset('storage/'.$teams->icon)}}" alt="" style="border-radius:4em" srcset="" width="50cm" height="60cm">
        @endif
        {{$teams->nom}}
        <br>
        <b>Membre(s) ({{$teams->membre }})</b>
    </div>
    @endif
    @endif
    @endforeach
    @endif
    @endforeach

</div>