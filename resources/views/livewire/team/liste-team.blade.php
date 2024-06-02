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
            Les groupes de game
        </h1>
    </center>
    <br>
    <center>
        <table class="table" cellspacing="50%" cellpadding="20%">
            <tr>
                <td>
                    Nom
                </td>
                <td>
                    description
                </td>
                <td>
                    icon
                </td>
                <td>
                    status
                </td>
            </tr>
            @foreach($game as $games)
            @if($games->status == "true")
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
            @else
            <tr>
                <td>
                    <a href="{{route('change',['id'=>$games->id])}}" wire:navigate> {{$games->nom}} </a>
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
                    <b style="color:green">&xcirc;</b>
                </td>
            </tr>
            @endif
            @endforeach

        </table>
    </center>
</div>