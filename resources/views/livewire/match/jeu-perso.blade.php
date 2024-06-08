<?php

use App\livewire\Match\JeuPerso;
use Livewire\Volt\Component;

new class extends Component
{
    public JeuPerso $jeux;
}

?>
<div>
    @if(session('stat') == '200')
    <b>Votre jeu est ajouter</b>
    @endif
    <br>
    <form wire:submit="addgame" enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom du jeu">
        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        <br><br>
        <label for="icon">
            Icon de votre jeu
        </label>
        @if($file)
        <img src="{{$file->temporaryUrl() }}" alt="Icone" width="50cm">
        @endif
        <input wire:model="file" type="file" name="" id="icon" hidden>
        <br><br>
        <label for="banniere">
            Votre banniere
        </label>
        @if($banniere)
        <img src="{{($banniere->temporaryUrl() )}}" style="height: 0.7cm; width: 2cm;" alt="">
        @endif
        <input wire:model="banniere" type="file" name="" id="banniere" hidden>
        <br><br>
        <textarea wire:model="description" name="" id="" placeholder="Description du jeu" cols="20" rows="3"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <br><br>
        <button>
            Ajouter le jeu
        </button>
    </form>
</div>