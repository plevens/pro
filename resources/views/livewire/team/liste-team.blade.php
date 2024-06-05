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
        <h1 id="team">
            Team
        </h1>
    </center>
    <br>
    <center>
        <table class="table" cellspacing="50%" cellpadding="20%">
            <tr class="tr"> 
                <td id="td">
                    Nom
                </td>
                <td id="td">
                    Creation du
                </td>
                <td id="td">
                    icon
                </td>
                <td id="td">
                    status
                </td>
            </tr>
            @foreach($game as $games)
            @if($games->status == "true")
            <tr>
                <td id="td2">
                    {{$games->nom}}
                </td>
                <td >
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
            @else
            <tr>

                <td id="td2">
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate>
                        {{$games->nom}}

                    </a>
                </td>
                <td >
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate>
                        {{$games->description}}
                    </a>
                </td>
                <td >
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate>
                        @if(strlen($games->icon) == 1)
                        {{$games->icon}}
                        @else
                        <img src="{{asset('storage/'.$games->icon)}}" width="55cm" style="border-radius:4cm" alt="Icone">
                        @endif
                    </a>
                </td>
                <td >
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