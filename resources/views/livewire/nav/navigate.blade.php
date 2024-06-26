<?php

use App\Livewire\Nav\Navigate;
use App\Models\Game;
use Livewire\Volt\Component;

new class extends Component
{
    public Navigate $team;
}

?>

<div wire:poll.5s>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <x-drop>
            <x-slot name="triggers">
                @if($n >= 1)
                @php
                $i = 0;
                @endphp
                @foreach($team as $teams)
                @if($teams->auth_id == Auth::user()->id)
                @if($teams->status == "true")
                @php
                $i++;
                @endphp
                <b class="btn btn-dark text-white">
                    <b style=" border-style:solid;color:green;padding:10px 10px;top:-1cm">&check;</b><b>{{$teams->nom}}</b>

                    @if(strlen($teams->icon) > 1)
                    &nbsp;
                    <input type="image" src="{{asset('storage/'.$teams->icon)}}" width="25px" height="25cm" style="border-radius:4em" alt="Icone" />
                    @else
                    &nbsp;

                    <b style="padding: 2px 5px ; background-color:black;color:aliceblue;border-radius:4em">{{$teams->icon}}</b>
                    @endif
                </b>
                @endif
                @endif
                @endforeach

                <!-- invitation team  -->
                @foreach($team_invitate as $_teams)
                @foreach($team as $__teams)

                @if($__teams->id == $_teams->team_id && $_teams->activate == 'true' && $_teams->user_id == Auth::user()->id && $_teams->accepted == "true")
                @php
                $i++;
                @endphp
                <b class="btn btn-dark text-white">
                    <b style="border-style:solid;color:green;padding:10px 10px;top:-1cm">&check;</b><b>{{$__teams->nom}}</b>

                    @if(strlen($__teams->icon) > 1)
                    &nbsp;
                    <input type="image" src="{{asset('storage/'.$__teams->icon)}}" width="25px" height="25cm" style="border-radius:4em" alt="Icone" />
                    @else
                    &nbsp;

                    <b style="padding: 2px 5px ; background-color:black;color:aliceblue;border-radius:4em">{{$__teams->icon}}</b>
                    @endif
                </b>
                @endif
                @endforeach
                @endforeach

                @if($i == 0)
                <b class="btn btn-dark text-white">Team</b>
                @endif
                @else
                <b class="btn btn-dark text-white">
                    Team
                </b>
                @endif
            </x-slot>
            <x-slot name="contents">
                <x-dropdown-link :href="route('addTeam')" style="text-decoration: none" wire:navigate>
                    {{ __('Creer un team') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('setup')" wire:navigate>
                    {{ __('Parametre du team') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('teams')" wire:navigate>
                    {{ __('Mon team') }}
                </x-dropdown-link>

                <hr>
                @if($n >= 1)

                @php
                $i = 0;
                $e = 0;
                @endphp


                <ul>
                    @foreach($team as $teams)
                    @if($teams->auth_id == Auth::user()->id)

                    @if($teams->status == "false")
                    @php
                    $i++;
                    @endphp
                    @if($i < 3) <li>
                        <x-dropdown-link href="{{route('change',['id'=>$teams->id])}}" wire:navigate>{{$teams->nom}}</x-dropdown-link>
                        </li>
                        @endif
                        @endif
                        @endif
                        @endforeach
                </ul>
                <!-- team accepter non activer  -->

                <ul>
                    @php
                    $p = 0;
                    @endphp
                    @foreach($team_invitate as $_teams)
                    @foreach($team as $teams)
                    @if($teams->id == $_teams->team_id && $_teams->activate == 'false' && $_teams->user_id == Auth::user()->id && $_teams->accepted == "true")
                    @php
                    $p++;
                    @endphp
                    @endif
                    @endforeach
                    @endforeach


                    @if($p>= 1)
                    <b>Team accepter</b>
                    @endif
                    <hr>


                    @foreach($team_invitate as $_teams)
                    @foreach($team as $teams)
                    @if($teams->id == $_teams->team_id && $_teams->activate == 'false' && $_teams->user_id == Auth::user()->id && $_teams->accepted == "true")
                    @php
                    $e++;
                    @endphp
                    @if($e < 3) <li>
                        <x-dropdown-link href="{{route('changed',['id'=>$_teams->id])}}" wire:navigate>{{$teams->nom}}</x-dropdown-link>
                        </li>
                        @endif
                        @endif
                        @endforeach
                        @endforeach

                        @endif
                </ul>
                <x-dropdown-link href="{{route('team')}}" wire:navigate>
                    voir tout les teams...
                </x-dropdown-link>
            </x-slot>
        </x-drop>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        @if($n >= 1)
        @php
        $i = 0;
        @endphp
        @foreach($team as $teams)
        @if($teams->auth_id == Auth::user()->id)
        @if($teams->status == "true")
        @php
        $i++;
        @endphp
        <b class="btn btn-dark text-white">
            <b style=" border-style:solid;color:green;padding:10px 10px;top:-1cm">&check;</b><b>{{$teams->nom}}</b>

            @if(strlen($teams->icon) > 1)
            &nbsp;
            <input type="image" src="{{asset('storage/'.$teams->icon)}}" width="25px" height="25cm" style="border-radius:4em" alt="Icone" />
            @else
            &nbsp;

            <b style="padding: 2px 5px ; background-color:black;color:aliceblue;border-radius:4em">{{$teams->icon}}</b>
            @endif
        </b>
        @endif
        @endif
        @endforeach

        <!-- invitation team  -->
        @foreach($team_invitate as $_teams)
        @foreach($team as $__teams)

        @if($__teams->id == $_teams->team_id && $_teams->activate == 'true' && $_teams->user_id == Auth::user()->id && $_teams->accepted == "true")
        @php
        $i++;
        @endphp
        <b class="btn btn-dark text-white">
            <b style="border-style:solid;color:green;padding:10px 10px;top:-1cm">&check;</b><b>{{$__teams->nom}}</b>

            @if(strlen($__teams->icon) > 1)
            &nbsp;
            <input type="image" src="{{asset('storage/'.$__teams->icon)}}" width="25px" height="25cm" style="border-radius:4em" alt="Icone" />
            @else
            &nbsp;

            <b style="padding: 2px 5px ; background-color:black;color:aliceblue;border-radius:4em">{{$__teams->icon}}</b>
            @endif
        </b>
        <br>
        @endif
        @endforeach
        @endforeach

        @if($i == 0)
        <b class="btn btn-dark text-white">Team</b>
        @endif
        @else
        <b class="btn btn-dark text-white">
            Team
        </b>
        @endif

        <x-responsive-nav-link :href="route('addTeam')" :active="request()->routeIs('addTeam')" style="text-decoration: none" wire:navigate>
            {{ __('Creer un team') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('setup')" :active="request()->routeIs('setup')" wire:navigate>
            {{ __('Parametre du team') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('teams')" :active="request()->routeIs('teams')" wire:navigate>
            {{ __('Mon team') }}
        </x-responsive-nav-link>

        <hr>
        @if($n >= 1)

        @php
        $i = 0;
        $e = 0;
        @endphp

        <b>Votre Equipe</b>
        <ul>
            @foreach($team as $teams)
            @if($teams->auth_id == Auth::user()->id)

            @if($teams->status == "false")
            @php
            $i++;
            @endphp
            @if($i < 3) <li>
                <a href="{{route('change',['id'=>$teams->id])}}" wire:navigate>{{$teams->nom}}</a>
                </li>
                @endif
                @endif
                @endif
                @endforeach
        </ul>
        <!-- team accepter non activer  -->

        <ul>
            @php
            $p = 0;
            @endphp
            @foreach($team_invitate as $_teams)
            @foreach($team as $teams)
            @if($teams->id == $_teams->team_id && $_teams->activate == 'false' && $_teams->user_id == Auth::user()->id && $_teams->accepted == "true")
            @php
            $p++;
            @endphp
            @endif
            @endforeach
            @endforeach

            <hr>
            @if($p>= 1)
            <b>Equipe accepter</b>
            @endif



            @foreach($team_invitate as $_teams)
            @foreach($team as $teams)
            @if($teams->id == $_teams->team_id && $_teams->activate == 'false' && $_teams->user_id == Auth::user()->id && $_teams->accepted == "true")
            @php
            $e++;
            @endphp
            @if($e < 3) <li>
                <a href="{{route('changed',['id'=>$_teams->id])}}" wire:navigate>{{$teams->nom}}</a>
                </li>
                @endif
                @endif
                @endforeach
                @endforeach

                @endif
        </ul>
        <a href="{{route('team')}}" wire:navigate>
            voir tout les teams...
        </a>
    </div>
</div>