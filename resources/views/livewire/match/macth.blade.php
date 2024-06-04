<?php
use App\Livewire\Match\Macth;
use Livewire\Volt\Component;

new class extends Component
{
    public Macth $game;
}
?>
 <center>
     @if(session('status') == '200')
        <h1 style="color: green">
            Jeu ajouter
        </h1>
     @endif
     @if(session('status') == '401')
        <h1 style="color: red">
            Vous avez deja ajouter un jeu
        </h1>
     @endif

    <form wire:submit="startGame"  enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        <br><br>
        <label for="icon">Votre icon</label>
        <br>
        <input wire:model="file" type="file" hidden name="file" id="icon">
        <br>
        Description de votre jeu <br>
        <textarea wire:model="description" name="" id="" cols="20" rows="3"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <br>
        <button>
            Ajouter votre jeu
        </button>        
    </form>
</center>
