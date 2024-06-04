<?php

use App\Livewire\Match\Macth;
use Livewire\Volt\Component;

new class extends Component
{
    public Macth $macth;
}

?>

<div>
    <form wire:submit="startGame" enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
        <br><br>
        <label for="icon">Votre icon</label>
        <br>
        <input wire:model="file" type="file" hidden name="" id="icon">
        <br>
        description de votre jeu <br>
        <textarea wire:model="description" name="" id="" cols="20" rows="3"></textarea>
        <br>
        <button wire:navigate>
            Lancer le jeu
        </button>
    </form>
</div>