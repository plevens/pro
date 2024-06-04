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
</div>