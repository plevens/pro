<?php

use App\livewire\Match\SeenjeuUser;
use Livewire\Volt\Component;

new class extends Component
{
    public SeenjeuUser $jeux;
}

?>


<div>
    <table class="table" cellspacing="50%" cellpadding="20%">
        <tr>
            <td>Icon</td>
            <td>Nom</td>
            <td>Banniere</td>
            <td>Description</td>
        </tr>
        @foreach($jeux as $jeu)
        @foreach($gamestat as $games)
        @if($jeu->team_id == $games->team_id && $games->user_id == Auth::user()->id)
        <tr>
            @if(strlen($jeu->icon) > 1)
            <td><img src="{{asset('storage/'.$jeu->icon)}}" width="50cm" height="50cm" style="border-radius:4em" alt=""></td>
            @else
            <td>{{$jeu->icon}}</td>
            @endif
            <td>{{$jeu->nom}}</td>
            @if(strlen($jeu->banniere) > 1)
            <td><img src="{{asset('storage/'.$jeu->banniere)}}" style="height: 0.7cm; width: 2cm;" alt=""></td>
            @endif
            <td>{{$jeu->description}}</td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </table>
    @if($u == 1)
    L'Administrateur :
    @foreach($jeux as $jeu)
    @foreach($gamestat as $stat)
    @foreach($game as $games)
    @if($jeu->team_id == $stat->team_id && $stat->user_id == Auth::user()->id && $games->id == $jeu->team_id)
    {{$jeu->auth_id}}
    @endif
    @endforeach
    @endforeach
    @endforeach
    @endif
    <br>
</div>