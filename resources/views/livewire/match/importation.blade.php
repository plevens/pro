<?php

use App\Livewire\Match\Importation;
use Livewire\Volt\Component;

new class extends Component
{
    public Importation $import;
}

?>

<div>
    Situation du jeux activer sur votre profil selon votre groupe
    <table class="table" cellspacing="50%" cellpadding="20%">
        <tr>
            <td>Icon</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Banniere</td>
            <td></td>
        </tr>
        @if($n == 1)
        <tr>
            @if(strlen($icon) > 1)
            <td><img src="{{asset('storage/'.$icon)}}" width="50cm" height="50cm" style="border-radius:4em" alt=""></td>
            @else
            <td>{{$icon}}</td>
            @endif
            <td>{{$nom}}</td>
            <td>{{$description}}</td>
            <td>
                @if(strlen($banniere) > 1)
                <img src="{{asset('storage/'.$banniere)}}" style="height: 0.7cm; width: 2cm;" alt="">

                @endif
            </td>
            <td>
                @if($t == 1 )
                Jeux du groupe
                @else
                @if($i == 1)

                @else
                <form wire:submit="addGame">
                    <input wire:model="nom" type="hidden" name="" id="">
                    <input wire:model="icon" type="hidden" name="" id="">
                    <input wire:model="banniere" type="hidden" name="" id="">
                    <input wire:model="description" type="hidden" name="" id="">
                    <button>
                        Ajouter comme jeu du groupe
                    </button>
                </form>
                @endif
                @endif
            </td>

        </tr>
        @endif
    </table>
</div>