<?php
use App\Livewire\Match\Gameblock;
use Livewire\Volt\Component;

new class extends Component
{
    public Gameblock $block;
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
            @if($key->auth_id == $auth_id && $keys->auth_id == $auth_id && $keys->status == 'true' && $keys->id == $key->game_id && $key->status == 'false')
        <tr>
            @if(strlen($key->icon) > 1)
            <td><img src="{{asset('storage/'.$key->icon)}}" width="50cm" height="50cm" style="border-radius:4em" alt=""></td>
            @else
            <td>{{$key->icon}}</td>
            @endif
            <td>{{$key->nom}}</td>
            <td>{{$key->description}}</td>
            @if(strlen($key->banniere) > 1)
            <td><img src="{{asset('storage/'.$key->banniere)}}" style="height: 0.5cm; width: 2cm;" alt=""><td>
            @endif
            <td>
                <a href="{{route('restaurejeu',['id'=>$key->id])}}" wire:navigate>
                    <button id="button-ajouter">
                        Restaurer
                    </button>
                </a> <br><br>
                <a href="{{route('deletejeu',['id'=>$key->id])}}" wire:navigate>
                    <x-danger-button>
                        Supprimer definitivement
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
            {{$used->name}}
        @endif
    @endforeach
    @endforeach
    <br><br>
    Le(s) joueur(s) : 
    @foreach($user as $used)
    @foreach($game as $keys)
    @foreach($jeux as $key)
    @foreach($gamestatus as $kye)
        @if($key->game_id == $kye->team_id && $keys->status == 'true' && $keys->id == $key->game_id && $kye->user_id == $used->id && $kye->auth_id == $auth_id && $key->status == 'false')
            <br>
            {{$used->name}} ({{$kye->pseudo}})
        @endif
    @endforeach
    @endforeach
    @endforeach
    @endforeach
</div>
