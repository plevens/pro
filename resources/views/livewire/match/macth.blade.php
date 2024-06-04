<?php

use App\Livewire\Match\Macth;
use Livewire\Volt\Component;

new class extends Component
{
    public Macth $macth;
}
?>

<div>
<<<<<<< HEAD
    <center>
    <form wire:submit="startGame" enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
        <br>
        <label for="icon">
            icon de votre jeu
        </label>
        <input wire:model="file" type="file" name="" id="icon" hidden>
        <br>
        <textarea wire:model="description" name="" id="" cols="20" rows="3"></textarea>
        <br><br>
        <button>
            Ajouter votre jeu
        </button>
    </form>
    </center>
=======
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
>>>>>>> 7690a59c3fa2ca236a7a8eca610adc0a0b41c042
</div>