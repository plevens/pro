<?php

use App\Livewire\Team\ListeTeam;
use Livewire\Volt\Component;

new class extends Component
{
    public ListeTeam $team;
}

?>

<div>
    <center>
        <h1>
            Team
        </h1>
    </center>
    <br>
    <center>
        <table class="table" cellspacing="50%" cellpadding="20%">
            <tr class="bg-dark">
                <td>
                    Nom
                </td>
                <td>
                    Creation du
                </td>
                <td>
                    icon
                </td>
                <td>
                    status
                </td>
            </tr>
            @foreach($game as $games)
            @if($games->status == "true" && $games->auth_id == Auth::user()->id)
            <tr>
                <td>
                    {{$games->nom}}
                </td>
                <td>
                    {{$games->description}}
                </td>
                <td>
                    @if(strlen($games->icon) == 1)
                    {{$games->icon}}
                    @else
                    <img src="{{asset('storage/'.$games->icon)}}" width="55cm" style="border-radius:4cm" alt="Icone">
                    @endif
                </td>
                <td>
                    <b style="color:green">&check;</b>
                </td>
            </tr>
            @endif
            @if($games->status == "false" && $games->auth_id == Auth::user()->id)
            <tr>

                <td>
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate>
                        {{$games->nom}}

                    </a>
                </td>
                <td>
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate>
                        {{$games->description}}
                    </a>
                </td>
                <td>
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate>
                        @if(strlen($games->icon) == 1)
                        {{$games->icon}}
                        @else
                        <img src="{{asset('storage/'.$games->icon)}}" width="55cm" style="border-radius:4cm" alt="Icone">
                        @endif
                    </a>
                </td>
                <td>
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate>
                        <b style="color:green">&xcirc;</b>
                    </a>
                </td>

            </tr>
            @endif
            @endforeach

        </table>
    </center>
</div>