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
            <ul>
                @foreach($team as $teams)
                @if($teams->auth_id == Auth::user()->id)
                @if($teams->status == "true")
                <li>
                    <img src="{{asset('/storage/app/'.$teams->icon) }}" alt="" width="20cm" height="20cm">

                    {{$teams->nom}} <b style="border-style:solid;color:green;padding:10px 10px">&check;</b>
                </li>
                @endif
                @endif
                @endforeach
            </ul>
            @else
            <button>
                Team
            </button>
            @endif
        </x-slot>
        <x-slot name="contents">
            <x-dropdown-link :href="route('addTeam')" wire:navigate>
                {{ __('Ajouter') }}
            </x-dropdown-link>
            <hr>
            @if($n >= 1)

            <ul>
                @foreach($team as $teams)
                @if($teams->auth_id == Auth::user()->id)
                @if($teams->status == "false")
                <li>
                    <a href="{{route('change',['id'=>$teams->id])}}" wire:navigate>{{$teams->nom}}</a>
                </li>
                @endif
                @endif
                @endforeach
            </ul>
            @endif
        </x-slot>
    </x-drop>
</div>