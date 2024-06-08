<?php

use App\Livewire\Match\Updategameperso;
use Livewire\Volt\Component;

new class extends Component
{
    public Updategameperso $updaye;
}
?>
<div>
    <form wire:submit="updateGame" enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        <br><br>
        <label for="icon">
            Icon
        </label>
        <input wire:model="icon" type="file" name="" id="icon" hidden>
        @if($icon)
        <img src="{{($icon->temporaryUrl())}}" width="50cm" height="50cm" style="border-radius:4em" alt="">
        @else
        <img src="{{asset('storage/'.$icons)}}" width="50cm" height="50cm" style="border-radius:4em" alt="">
        @endif
        <br><br>
        <label for="baniere">Votre banniere</label>
        <input wire:model="banniere" type="file" name="" id="baniere" hidden>
        @if($banniere)
        <img src="{{($banniere->temporaryUrl())}}" width="50cm" height="50cm" style="height: 0.7cm; width: 2cm;" alt="">
        @else
        <img src="{{asset('storage/'.$bannieres)}}" width="50cm" height="50cm" style="height: 0.7cm; width: 2cm;" alt="">
        @endif
        <br><br>
        <textarea wire:model="description" placeholder="Description du jeu" name="" id="" cols="20" rows="3"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <br><br>
        <button>
            Modifier
        </button>
    </form>
</div>