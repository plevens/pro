<?php

use App\Livewire\Team\Dash;
use Livewire\Volt\Component;

new class extends Component
{
    public Dash $link;
}

?>
<div>
    @if($n >= 1)
    @foreach($game as $gamers)
    @if($gamers->auth_id == Auth::user()->id)
    <div>
        <div style="position:fixed;background-color:black;color:white;height:100%">
            <a href="{{route('member.team')}}" wire:navigate>Membres</a>
            <br>
            <button>Jeux</button>
            <br>
            <button>Pseudo</button>
            <br>
            <button>Messages</button>
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
            <a href="{{$_teams->id}}" wire:navigate>Membre(s)</a>
            <br>
            <button>Jeux</button>
            <br>
            <button>Pseudo</button>
            <br>
            <button>Messages</button>
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>