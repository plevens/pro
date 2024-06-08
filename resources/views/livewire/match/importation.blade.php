<?php

use App\Livewire\Match\Importation;
use Livewire\Volt\Component;

new class extends Component
{
    public Importation $import;
}

?>

<div>
    Votre jeu :
    <table class="table" cellspacing="50%" cellpadding="20%">
        <tr>
            <td>Icon</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Banniere</td>
            <td></td>
        </tr>
        @foreach($game as $key)
        @if($key->auth_id == Auth::user()->id && $key->status == 'true')
        <tr>
            @if(strlen($key->icon) > 1)
            <td><img src="{{asset('storage/'.$key->icon)}}" width="50cm" height="50cm" style="border-radius:4em" alt=""></td>
            @else
            <td>{{$key->icon}}</td>
            @endif
            <td>{{$key->nom}}</td>
            <td>{{$key->description}}</td>
            @if(strlen($key->banniere) > 1)
            <td><img src="{{asset('storage/'.$key->banniere)}}" style="height: 0.7cm; width: 2cm;" alt="">
            </td>
            @endif
            <td>
                <form wire:submit="addGame">
                    <input wire:model="nom" type="hidden" name="" id="">
                    <input wire:model="icon" type="hidden" name="" id="">
                    <input wire:model="banniere" type="hidden" name="" id="">
                    <input wire:model="description" type="hidden" name="" id="">
                    <button>
                        Ajouter comme jeu du groupe
                    </button>
                </form>
            </td>

        </tr>
        @endif
        @endforeach
    </table>
</div>