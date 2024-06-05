<?php

use App\Livewire\Team\ListeTeam;
use Livewire\Volt\Component;

new class extends Component
{
    public ListeTeam $team;
}

?>

<div wire:poll.5s>
    <center>
        <h1 id="team">
            Team
        </h1>
    </center>
    <br>
    <center>
        <!-- Message d'avoir quitter le groupe  -->
        @if(session('msg'))
        @foreach($game as $games)
        @if($games->id == session('msg'))
        Vous avez quitter le groupe {{$games->nom}}
        @endif
        @endforeach
        @endif
        <!-- tableau pour afficher les teams(groupes) disponible  -->
        <table class="table" cellspacing="50%" cellpadding="20%">
            <tr class="tr"> 
                <td>
                    
                </td>
                <td id="td">
                    Nom
                </td>
                <td>
                    Creer le
                </td>
                <td id="td">
                    status
                </td>
                <td>

                </td>
            </tr>
            @foreach($game as $games)
            @if($games->status == "true" && $games->auth_id == Auth::user()->id)

            <tr>
                <td>
            @if(strlen($games->icon) == 1)
                    {{$games->icon}}
                    @else
                    <img src="{{asset('storage/'.$games->icon)}}" width="55cm" style="border-radius:4cm" alt="Icone">
                    @endif
                    </td>
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
                <td>
                    <a href="{{route('supprime.game',['id'=>$games->id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">
                        <x-danger-button>
                            Supprimer
                        </x-danger-button>
                    </a>
                </td>
            </tr>
            @endif
            @if($games->status == "false" && $games->auth_id == Auth::user()->id)
            <tr>

                <td id="td2">
                <td>
            @if(strlen($games->icon) == 1)
                    {{$games->icon}}
                    @else
                    <img src="{{asset('storage/'.$games->icon)}}" width="55cm" style="border-radius:4cm" alt="Icone">
                    @endif
                    </td>
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
                <td>
                    <a href="{{route('supprime.game',['id'=>$games->id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">
                        <x-danger-button>
                            Supprimer
                        </x-danger-button>
                    </a>
                </td>

            </tr>
            @endif
            @foreach($_team as $_tesams)
            @if($_tesams->activate == "true" && $_tesams->user_id == Auth::user()->id && $_tesams->team_id == $games->id && $_tesams->accepted == "true")
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
                <td>
                    <a href="{{route('exit.team',['id'=>$_tesams->id])}}" onclick="if(confirm('Voulez-vous vraiment quitter le groupe ?')){}else return false;" wire:navigate>
                        <x-danger-button>
                            Quitter cet groupe
                        </x-danger-button>
                    </a>
                </td>
            </tr>
            @endif
            @if($_tesams->activate == "false" && $_tesams->user_id == Auth::user()->id && $_tesams->team_id == $games->id && $_tesams->accepted == "true" )
            <tr>
                <td>
                    <a href="{{route('changed',['id'=>$_tesams->id])}}" wire:navigate>
                        {{$games->nom}}
                    </a>
                </td>
                <td>
                    <a href="{{route('changed',['id'=>$_tesams->id])}}" wire:navigate>

                        {{$games->description}}
                    </a>
                </td>
                <td>
                    <a href="{{route('changed',['id'=>$_tesams->id])}}" wire:navigate>

                        @if(strlen($games->icon) == 1)
                        {{$games->icon}}
                        @else
                        <img src="{{asset('storage/'.$games->icon)}}" width="55cm" style="border-radius:4cm" alt="Icone">
                        @endif
                    </a>
                </td>
                <td>
                    <a href="{{route('changed',['id'=>$_tesams->id])}}" wire:navigate>

                        <b style="color:green">&xcirc;</b>
                    </a>
                </td>
                <td>
                    <a href="{{route('exit.team',['id'=>$_tesams->id])}}" onclick="if(confirm('Voulez-vous vraiment quitter le groupe ?')){}else return false;" wire:navigate>
                        <x-danger-button>
                            Quitter cet groupe
                        </x-danger-button>
                    </a>
                </td>
            </tr>
            @endif
            @endforeach
            @endforeach

        </table>
    </center>
</div>