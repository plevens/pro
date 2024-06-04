<?php

use App\Livewire\Team\NameUpdate;
use Livewire\Volt\Component;

new class extends Component
{
    public NameUpdate $it;
}

?>

<div>
    <center>

        @foreach($game as $games)
        @if($games->auth_id == Auth::user()->id)
        <h2>Modifier le nom du groupe</h2>
        <br>
        <form action="{{route('update.name',['id'=>$games->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(strlen($games->icon) == 1)
            <label for="img">{{$games->icon}}</label>
            <br>
            @else
            <label for="img"><img src="{{asset('storage/'.$games->icon)}}" width="50cm" alt=""></label>
            @endif
            <input type="file" name="file" id="img" hidden>
            <input type="text" name="image" value="{{$games->icon}}" hidden>
            <input type="text" name="name" value="{{$games->nom}}" id="">
            <input type="hidden" name="id" value="{{$games->id}}" id="">
            <br>
            <br>
            <x-primary-button>Modifier</x-primary-button>
        </form>
        @endif
        @endforeach

        @foreach($_game as $_games)
        @if($_games->user_id == Auth::user()->id)
        <h2>Modifier Votre profil</h2>
        <br>
        <form action="{{route('update.utilisateur',['id'=>$_games->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            Votre avatare
            <br>
            @if(strlen($_games->avatar) == 1)
            <label for="img" style="background-color:cadetblue;padding:10px 15px ;border-radius:3em">{{$_games->avatar}}</label>
            <br>
            <br>
            @else
            <label for="img"><img src="{{asset('storage/'.$_games->avatar)}}" style="border-radius:4em" width="50cm" height="50cm" alt=""></label>
            @endif
            <br>
            <input type="file" name="file" id="img" hidden>
            <label for="pseudo">Pseudo</label>
            <br>
            <input type="text" name="image" value="{{$_games->avatar}}" hidden>
            <input type="text" name="pseudo" value="{{$_games->pseudo}}" id="pseudo">
            <input type="hidden" name="id" value="{{$_games->id}}" id="">
            <br>
            <br>
            <x-primary-button>Modifier</x-primary-button>
        </form>
        <br>
        <h2>Vous etes dans le groupe</h2>
        <a href="{{route('exit.team',['id'=>$_games->id])}}" wire:navigate>
            <x-danger-button>
                Quitter le groupe
            </x-danger-button>
        </a>
        @endif
        @endforeach


    </center>
</div>