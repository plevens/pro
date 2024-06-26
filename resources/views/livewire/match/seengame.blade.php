<?php

use App\Livewire\Match\Seengame;
use Livewire\Volt\Component;

new class extends Component
{
    public Seengame $game;
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
        @foreach($jeux as $key)
        @foreach($game as $keys)
        @if($key->auth_id == $auth_id && $keys->auth_id == $auth_id && $keys->status == 'true' && $keys->id == $key->team_id && $key->status == 'true')
        <tr>
            @if(strlen($key->icon) > 1)
            <td><img src="{{asset('storage/'.$key->icon)}}" width="50cm" height="50cm" style="border-radius:4em" alt=""></td>
            @else
            <td>{{$key->icon}}</td>
            @endif
            <td>{{$key->nom}}</td>
            <td>{{$key->description}}</td>
            <td>
                @if(strlen($key->banniere) > 1)
                <img src="{{asset('storage/'.$key->banniere)}}" style="height: 0.7cm; width: 2cm;" alt="">
                @endif
            </td>
            <td>
                <a href="{{route('deletejeu',['id'=>$key->id])}}" wire:navigate>
                    <x-danger-button>
                        Supprimer
                    </x-danger-button>
                </a>
            </td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </table>
    <br>
    L'Admininstateur :
    @foreach($user as $used)
    @foreach($game as $keys)
    @if($used->id == $keys->auth_id && $keys->status == 'true' && $keys->auth_id == $auth_id)
    {{$used->name}}(Vous)
    @endif
    @endforeach
    @endforeach
    <br><br>
    Le(s) joueur(s) :
    @foreach($user as $used)
    @foreach($game as $keys)
    @foreach($jeux as $key)
    @foreach($gamestatus as $kye)
    @if($key->team_id == $kye->team_id && $keys->status == 'true' && $keys->id == $key->team_id && $kye->user_id == $used->id && $kye->auth_id == $auth_id && $key->status == 'true')
    <br>
    {{$used->name}} ({{$kye->pseudo}})
    @endif
    @endforeach
    @endforeach
    @endforeach
    @endforeach
</div>