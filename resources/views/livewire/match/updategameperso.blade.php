<?php

use App\Livewire\Match\Updategameperso;
use Livewire\Volt\Component;

new class extends Component
{
    public Updategameperso $updaye;
}
?>


<div>
    @foreach($game as $key)
    @if($key->auth_id == Auth::user()->id && $key->status == 'true')
    <form wire:submit="updateGame" enctype="multipart/form-data">
        <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        <br><br>
        <label for="icon">
            Icon
        </label>
        <input wire:model="icon" type="file" name="" id="icon" hidden>
        @if(strlen($key->icon) > 1)
        <img src="{{asset('storage/'.$key->icon)}}" width="50cm" height="50cm" style="border-radius:4em" alt=""></td>
        @else
        {{$key->icon}}
        @endif
        <br><br>
        <label for="baniere">Votre banniere</label>
        <input wire:model="banniere" type="file" name="" id="baniere" hidden>
        <img src="{{asset('storage/'.$key->banniere)}}" width="50cm" height="50cm" style="height: 0.7cm; width: 2cm;" alt=""></td>
        <br><br>
        <textarea wire:model="description" placeholder="Description du jeu" name="" id="" cols="20" rows="3"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
        <br><br>
        <button>
            Modifier
        </button>
    </form>
    @endif
    @endforeach
</div>