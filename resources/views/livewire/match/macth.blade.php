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
        @if(session('stat') == '200')
        <b>Votre jeu est ajouté</b>
        @endif
        @if(session('stat') == '401')
        <b>Vous avez déja ajouté un jeu</b>
        @endif
        @if(session('stat') == '402')
        <b>Vous avez deja un jeu bloquer</b> <br>
        @endif
        <br>
        <form wire:submit="startGame" enctype="multipart/form-data">
            <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            <br><br>
            <label for="icon">
                inserez votre icon
            </label>
            <input wire:model="file" type="file" name="" id="icon" hidden>
            @if($file)
            <img src="{{$file->temporaryUrl() }}" alt="Icone" width="20cm">
            @else
            <b wire:loading="chargement"></b>
            @endif
            <br><br>
            <label for="baniere">Votre banniere</label>
            <input wire:model="banniere" type="file" name="" id="baniere" hidden>
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