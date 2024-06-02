<?php

use App\Livewire\Team\Team;
use Livewire\Volt\Component;

new class extends Component
{

    public Team $team;
}

?>

<div>
    <center>
        <h1>
            Ajouter votre groupe
        </h1>
        <form wire:submit="addGame" enctype="multipart/form-data">
            <input wire:model="nom" type="text" placeholder="Nom" name="" id="">
            <br>
            <label for="tof">Photo:</label> <input wire:model="file" type="file" name="" id="tof">
            <br>
            @if($file)
            <img src="{{$file->temporaryUrl() }}" alt="Icone">
            @endif
            <br>
            <textarea wire:model="description" id="" placeholder="description"></textarea>
            <br>
            <input type="submit" value="Enregistrer">
        </form>
    </center>
</div>