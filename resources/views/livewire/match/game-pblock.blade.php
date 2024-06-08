<?php

use App\Livewire\Match\GamePblock;
use Livewire\Volt\Component;

new class extends Component
{
    public GamePblock $game;
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
        @if($key->auth_id == Auth::user()->id && $key->status == 'false')
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
            <td>
                @endif
            <td>
                <a href="{{route('restaurejeuP',['id'=>$key->id])}}" wire:navigate>
                    <x-danger-button>
                        Restaurer
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