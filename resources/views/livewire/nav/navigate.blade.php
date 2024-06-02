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
            @php
            $i = 0;
            @endphp
            @foreach($team as $teams)
            @if($teams->auth_id == Auth::user()->id)
            @if($teams->status == "true")
            @php
            $i++;
            @endphp
            <b style="cursor: pointer;background-color:skyblue;border-radius:20px">
                <b style="border-style:solid;color:green;padding:10px 10px;top:-1cm">&check;</b><b>{{$teams->nom}}</b>

                @if(strlen($teams->icon) > 1)
                &nbsp;
                <input type="image" src="{{asset('storage/'.$teams->icon)}}" width="25px" height="25cm" style="border-radius:4em" alt="Icone" />
                @else
                &nbsp;

                <b style="padding: 2px 5px ; background-color:black;color:aliceblue;border-radius:4em">{{$teams->icon}}</b>
                @endif
            </b>
            @endif
            @endif
            @endforeach
            @if($i == 0)
            <b style="cursor: pointer;display: inline-block;">Team</b>
            @endif
            @else
            <button>
                Team
            </button>
            @endif
        </x-slot>
        <x-slot name="contents">
            <x-dropdown-link :href="route('addTeam')" wire:navigate>
                {{ __('Creer un team') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('setup')" wire:navigate>
                {{ __('Parametre du team') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('teams')" wire:navigate>
                {{ __('Mon team') }}
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