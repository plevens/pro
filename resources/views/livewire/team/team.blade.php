<?php

use App\Livewire\Team\Team;
use Livewire\Volt\Component;

new class extends Component
{

    public Team $team;
}

?>

<div >
    <center>
        <h1 class="text-primary">
            Ajouter votre groupe
        </h1>
        <form wire:submit="addGame" enctype="multipart/form-data">
            <input wire:model="nom" type="text" placeholder="Nom" name="" id="Ajouter_votre_groupe">
            <br>
            <label for="tof" class="tof">Photo du groupe </label> <input hidden wire:model="file" type="file" name="" id="tof">
            <br>
            <b></b>
            @if($file)
            <img src="{{$file->temporaryUrl() }}" alt="Icone" width="100cm">
            @else
            <b wire:loading="chargement"></b>
            @endif
            <br>
            <input type="submit" value="Enregistrer" >
        </form>
    </center>
</div>