<?php

use App\Livewire\Team\Dash;
use Livewire\Volt\Component;

new class extends Component
{
    public Dash $link;
}

?>
<div wire:poll.5s>
    @if($n >= 1)
    @foreach($game as $gamers)
    @if($gamers->auth_id == Auth::user()->id)
    <div>
        <div style="position:fixed;background-color:black;color:white;height:100%">
            <a href="{{route('member.team')}}" wire:navigate>Membres</a>
            <br>
            <a href="{{route('gameTeam')}}" wire:navigate>Jeux</a>
            <br>
            <button>Messages</button>
            <br>
            <a href="{{route('supprime.game',['id'=>$gamers->id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">
                <x-danger-button>
                    Supprimer
                </x-danger-button>
            </a>
        </div>
    </div>
    @endif
    @endforeach
    @endif


    @if($i >= 1)
    @foreach($_team as $_teams)
    @if($_teams->user_id == Auth::user()->id)
    <div>
        <div style="position:fixed;background-color:black;color:white;height:100%">
            <a href="{{route('member.team')}}" wire:navigate>Membre(s)</a>
            <br>
            <button>Jeux</button>
            <br>
            <button>Pseudo</button>
            <br>
            <a href="{{route('smsTeam')}}" wire:navigate>Messages</a>
            <br>
            <a href="{{route('exit.team',['id'=>$_teams->id])}}" wire:navigate>
                <x-danger-button>
                    Quitter le groupe
                </x-danger-button>
            </a>
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>