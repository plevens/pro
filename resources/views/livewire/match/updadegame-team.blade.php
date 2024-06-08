<?php

use App\Livewire\Match\UpdadegameTeam;
use Livewire\Volt\Component;

new class extends Component
{
    public UpdadegameTeam $macth;
}
?>

<div>
    @if($i == 1)
    <form wire:submit="updateGame" enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu" value="{{$nom}}">
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
        @if($banniere)
        <img src="{{($banniere->temporaryUrl())}}" width="50cm" height="50cm" style="height: 0.7cm; width: 2cm;" alt="">
        @else
        <img src="{{asset('storage/'.$bann)}}" width="50cm" height="50cm" style="height: 0.7cm; width: 2cm;" alt="">
        @endif
        <input wire:model="banniere" type="file" name="" id="baniere" hidden>
        <br><br>
        <textarea wire:model="description" placeholder="Description du jeu" name="" id="" cols="20" rows="3"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <br><br>
        <button>
            Modifier
        </button>
    </form>
    @endif
</div>