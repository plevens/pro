<?php

use App\Livewire\Team\Dash;
use Livewire\Volt\Component;

new class extends Component
{
    public Dash $link;
}

?>
<div wire:poll.5s class="fixed-top" style="margin-top:1.9cm">
    @if($n >= 1)
    @foreach($game as $gamers)
    @if($gamers->auth_id == Auth::user()->id)
    <div>
        <div style="position:fixed;background-color:white;color:white;height:100%">
            <a href="{{route('member.team')}}" wire:navigate><img src="{{asset('icons/people.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('gameTeam')}}" wire:navigate><img src="{{asset('icons/controller.svg')}}" alt="" srcset=""></a>
            <br>
<<<<<<< HEAD
            <a href="{{route('smsTeam')}}" wire:navigate>Messages</a>
            <br><br>
            <a href="{{route('supprime.game',['id'=>$gamers->id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">
                <x-danger-button id="Supprimer">
                    Supprimer
                </x-danger-button>
=======
            <a href="{{route('smsTeam')}}" wire:navigate><img src="{{asset('icons/chat.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('supprime.game',['id'=>$gamers->id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">

                <img src="{{asset('icons/trash.svg')}}" alt="" srcset="">

>>>>>>> e73ad1f864b1e162e616a86a594770e80cfaa56b
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
        <div style="position:fixed;background-color:white;color:white;height:100%">
            <a href="{{route('member.team')}}" wire:navigate><img src="{{asset('icons/people.svg')}}" alt="" srcset=""></a>
            <br>
            <a><img src="{{asset('icons/controller.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('avatar.pseudo')}}" wire:navigate><img src="{{asset('icons/person-badge.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('smsTeam')}}" wire:navigate><img src="{{asset('icons/chat.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('exit.team',['id'=>$_teams->id])}}" wire:navigate>
                <img src="{{asset('icons/door-open.svg')}}" alt="" srcset="">
            </a>
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>