<?php

use App\Livewire\Match\SeengamePerso;
use Livewire\Volt\Component;

new class extends Component
{
    public SeengamePerso $game;
}


?>

<div>
    <table class="table" cellspacing="50%" cellpadding="20%">
        <tr>
            <td>Icon</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Banniere</td>
            <td>Menu</td>
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
                <a href="{{route('modifJeuP',['id'=>$key->id])}}" wire:navigate>
                    <x-danger-button>
                        Modifier
                    </x-danger-button>
                </a>
                <a href="{{route('supprimeJeuP',['id'=>$key->id])}}" wire:navigate>
                    <x-danger-button>
                        bloquer
                    </x-danger-button>
                </a>
                <a href="{{route('deletejeuP',['id'=>$key->id])}}" wire:navigate>
                    <x-danger-button>
                        Supprimer
                    </x-danger-button>
                </a>

            </td>
        </tr>
        @endif
        @endforeach
    </table>
</div>