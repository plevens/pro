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
        @if($p == 1)
        <h2 id="Modifier-le-nom-du-groupe">Modifier le nom du groupe</h2>
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
            <input type="file" wire:model="img" name="file" id="img" hidden>
            <input type="text" wire:model="nom" name="name" value="{{$nom}}" id="input-modifier">
            <input type="hidden" name="id" wire:model="id" value="{{$id}}" id="">
            <br>
            <br>
            <button id="boutton-modifier">Modifier</button>
        </form>
        @endif


        @if($f == 1)
        <h2>Modifier Votre profil</h2>
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