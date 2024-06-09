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
        @if($key->auth_id == Auth::user()->id && $key->status == 'bloc')
        <tr>
            <td>
                @if(strlen($key->icon) > 1)
                <img src="{{asset('storage/'.$key->icon)}}" width="50cm" height="50cm" style="border-radius:4em" alt="">
                @else
                {{$key->icon}}
                @endif
            </td>
            <td>{{$key->nom}}</td>
            <td>{{$key->description}}</td>
            <td>
                @if(strlen($key->banniere) > 1)
                <img src="{{asset('storage/'.$key->banniere)}}" style="height: 0.7cm; width: 2cm;" alt="">
                @endif
            </td>
            <td>
                <a href="{{route('update.game',['id'=>$key->id])}}" class="btn btn-danger" wire:navigate>

                    Restaurer

                </a>
            </td>
        </tr>
        @endif
        @endforeach
    </table>
</div>