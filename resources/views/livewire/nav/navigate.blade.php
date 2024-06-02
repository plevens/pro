<?php

use App\Livewire\Nav\Navigate;
use App\Models\Game;
use Livewire\Volt\Component;

new class extends Component
{
    public Navigate $team;
}

?>

<div>
    <x-drop>
        <x-slot name="triggers">
            @if($n >= 1)

            @foreach($team as $teams)
            @if($teams->auth_id == Auth::user()->id)
            @if($teams->status == "true")
            <b style="cursor: pointer;display: inline-block;">
                @if(strlen($teams->icon) > 1)
                <img src="{{asset('storage/'.$teams->icon)}}" width="20px" height="10px" style="border-radius:4em" alt="Icone" style="">
                @else
                <b style="padding: 10px 20px ; background-color:black;color:aliceblue;border-radius:2cm">{{$teams->icon}}</b>
                @endif


                {{$teams->nom}} <b style="border-style:solid;color:green;padding:10px 10px">&check;</b>
            </b>
            @endif
            @endif
            @endforeach

            @else
            <button>
                Team
            </button>
            @endif
        </x-slot>
        <x-slot name="contents">
            <x-dropdown-link :href="route('addTeam')" wire:navigate>
                {{ __('Add game') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('addTeam')" wire:navigate>
                {{ __('Game setup') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('addTeam')" wire:navigate>
                {{ __('Chat Game team') }}
            </x-dropdown-link>

            <hr>
            @if($n >= 1)

            @php
            $i = 0;
            @endphp


            <ul>
                @foreach($team as $teams)
                @if($teams->auth_id == Auth::user()->id)

                @if($teams->status == "false")
                @php
                $i++;
                @endphp
                @if($i < 6) <li>
                    <x-dropdown-link href="{{route('change',['id'=>$teams->id])}}" wire:navigate>{{$teams->nom}}</x-dropdown-link>
                    </li>
                    @endif
                    @endif
                    @endif
                    @endforeach
            </ul>
            @endif
            <x-dropdown-link href="{{route('team')}}" wire:navigate>
                voir tout les teams...
            </x-dropdown-link>
        </x-slot>
    </x-drop>
</div>