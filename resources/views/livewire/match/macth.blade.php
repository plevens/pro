<?php

use App\Livewire\Match\Macth;
use Livewire\Volt\Component;

new class extends Component
{
    public Macth $macth;
}
?>
<div>
    <center>
    @if(session('status') == '200')
        <b>Votre jeu est ajouté</b>
    @endif
    @if(session('status') == '401')
        <b>Vous avez déja ajouté un jeu</b>
    @endif
    <form wire:submit="startGame" enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        <br><br>
        <label for="icon">
            icon de votre jeu
        </label>
        <input wire:model="file" type="file" name="" id="icon" hidden>
            @if($file)
            <img src="{{$file->temporaryUrl() }}" alt="Icone" width="50cm">
            @else
            <b wire:loading="chargement"></b>
            @endif
        <br><br>
        <textarea wire:model="description" placeholder="Description du jeu" name="" id="" cols="20" rows="3"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <br><br>
        <button>
            Ajouter votre jeu
        </button>
    </form>
    </center>
</div>