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
        <div style="position:fixed;background-color:white;color:white;height:100%">
            <a href="{{route('member.team')}}" wire:navigate><img src="{{asset('build/icons/people.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('gameTeam')}}" wire:navigate><img src="{{asset('build/icons/controller.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('smsTeam')}}" wire:navigate><img src="{{asset('build/icons/chat.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('supprime.game',['id'=>$gamers->id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">

                <img src="{{asset('build/icons/trash.svg')}}" alt="" srcset="">

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
            <a href="{{route('member.team')}}" wire:navigate><img src="{{asset('build/icons/people.svg')}}" alt="" srcset=""></a>
            <br>
            <a><img src="{{asset('build/icons/controller.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('avatar.pseudo')}}" wire:navigate><img src="{{asset('build/icons/person-badge.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('smsTeam')}}" wire:navigate><img src="{{asset('build/icons/chat.svg')}}" alt="" srcset=""></a>
            <br>
            <a href="{{route('exit.team',['id'=>$_teams->id])}}" wire:navigate>
                <img src="{{asset('build/icons/door-open.svg')}}" alt="" srcset="">
            </a>
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>