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
<<<<<<< HEAD

        @foreach($game as $games)
        @if($games->auth_id == Auth::user()->id)
        <h2 id="Modifier-le-nom-du-groupe">
            Modifier le nom du groupe
        </h2>
=======
        @if($p == 1)
        <h2>Modifier le nom du groupe</h2>
>>>>>>> e73ad1f864b1e162e616a86a594770e80cfaa56b
        <br>
        <form wire:submit="updateName" enctype="multipart/form-data">
            <label for="img" style="border-radius:50%">
                @if($img)
                <img src="{{$img->temporaryUrl() }}" alt="Icone" width="100cm">
                @else
                @if(strlen($icon) == 1)
                {{$icon}}
                @else

                <img src="{{asset('storage/'.$icon)}}" width="100cm" alt="">
                @endif
                @endif
            </label>
            <br>
<<<<<<< HEAD
            @else
            <label for="img"><img src="{{asset('storage/'.$games->icon)}}" width="50cm" alt=""></label>
            @endif
            <input type="file" name="file" id="img" hidden>
            <input type="text" name="image" value="{{$games->icon}}" hidden>
            <input type="text" name="name" value="{{$games->nom}}" id="input-modifier">
            <input type="hidden" name="id" value="{{$games->id}}" id="">
=======
            <input type="file" wire:model="img" name="file" id="img" hidden>
            <input type="text" wire:model="nom" name="name" value="{{$nom}}" id="">
            <input type="hidden" name="id" wire:model="id" value="{{$id}}" id="">
>>>>>>> e73ad1f864b1e162e616a86a594770e80cfaa56b
            <br>
            <br>
            <button id="boutton-modifier">Modifier</button>
        </form>
        @endif

<<<<<<< HEAD
        @foreach($_game as $_games)
        @if($_games->user_id == Auth::user()->id)
        <h2>
            Modifier Votre profil
        </h2>
=======

        @if($f == 1)
        <h2>Modifier Votre profil</h2>
>>>>>>> e73ad1f864b1e162e616a86a594770e80cfaa56b
        <br>
        <form wire:submit="updateProfile" enctype="multipart/form-data">
            Votre avatare
            <label for="img" style="border-radius:50%">
                @if($img)
                <img src="{{$img->temporaryUrl() }}" alt="Icone" width="100cm">
                @else
                @if(strlen($icon) == 1)
                {{$icon}}
                @else

                <img src="{{asset('storage/'.$icon)}}" width="100cm" alt="">
                @endif
                @endif
            </label>
            <br>
            <input type="file" wire:model="img" name="file" id="img" hidden>
            <input type="text" wire:model="nom" name="name" value="{{$nom}}" id="">
            <input type="hidden" name="id" wire:model="id" value="{{$id}}" id="">
            <br>
            <br>
            <button id="mod">Modifier</button>
        </form>

        @endif


    </center>
</div>