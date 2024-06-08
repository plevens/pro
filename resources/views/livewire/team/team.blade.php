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
        <h1 class="text-primary"id="creer_votre_groupe">
            Creer votre groupe
        </h1>
        <form wire:submit="addGame" enctype="multipart/form-data">
            <input wire:model="nom" type="text" placeholder="Nom" name="" id="input-ajouter">
            <br>
            <br>
            <label for="tof"id="photo_du_groupe" class="tof">Photo du groupe </label> <input hidden wire:model="file" type="file" name="" id="tof">
            <br>
            <b></b>
            @if($file)
            <img src="{{$file->temporaryUrl() }}" alt="Icone" width="100cm">
            @else
            <b wire:loading="chargement"></b>
            @endif
            
            <input type="submit" value="Enregistrer"id="boutton-enregistrer">
        </form>
    </center>
</div>