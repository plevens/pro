<?php

use App\Livewire\Actions\Membre;
use Livewire\Volt\Component;

new class extends Component
{
    public Membre $teams;
}

?>
<div wire:poll.5s>
    <center>
        @if(session('msg'))
        <b class="bg-warning text-white easy-in-out">! Vous avez supprimer un utilisateur du groupe</b>
        @endif
        <br>
        @foreach($team as $key)
        @if($key->auth_id == Auth::user()->id)
        Membre du groupe ({{$key->membre}})
        <br>
        <a href="{{route('membre.sup')}}">Ajouter un membre</a>

        <table cellpadding="10%" class="table w-6 border-2" style="text-align:center">
            <tr class="">
                <td>

                </td>
                <td>
                    Pseudo
                </td>
                <td>
                    Email
                </td>
                <td>
                    Role
                </td>
                <td>
                    date d'entrer
                </td>
                <td>
                    Menu
                </td>
            </tr>
            @endif
            @endforeach

            @foreach($team as $key)
            @if($key->auth_id == Auth::user()->id)
            @foreach($user as $users)
            @foreach($membres as $_membre)
            @if($_membre->auth_id == Auth::user()->id && $key->id == $_membre->team_id)
            @php
            $date = strtotime($_membre->updated_at);
            $format = date('d/m/Y',$date);
            @endphp
            @if($users->id == $_membre->user_id)
            <tr>
                <td>

                    @if(strlen($_membre->avatar) == 1)
                    <b style="background-color:cadetblue;border-radius:2em;padding:20px 20px ;font-weight:bold;">{{$_membre->avatar}}</b>
                    @else
                    <input type="image" src="{{asset('storage/'.$_membre->avatar)}}" style="border-radius:4em" alt="" width="50cm" height="50cm">
                    @endif
                </td>
                <td>

                    {{$_membre->pseudo}}


                </td>
                <td>

                    {{$_membre->email}}


                </td>
                <td>
                    {{$_membre->role}}
                </td>
                <td>
                    {{$format}}
                </td>
                <td>

                    <a href="" class="btn btn-dark">
                        Modif
                    </a>
                    <br>
                    @if($_membre->activate != 'bloque')
                    <a href="{{route('bloc.member',['id'=>$_membre->id])}}" wire:navigate class="btn btn-light" style="border-color:red;border-style:solid;border-radius:4em">
                        <b style="border-style:solid;border:1;color:red;">
                            -
                        </b>
                    </a>
                    @else
                    <a href="{{route('debloc.member',['id'=>$_membre->id])}}" wire:navigate class="btn btn-warning">
                        +
                    </a>
                    @endif
                    <a href="{{route('delete.member',['id'=>$_membre->id])}}" class="btn btn-danger" style="border-color:red;border-style:solid;border-radius:4em">

                        &Cross;

                    </a>

                </td>

            </tr>
            @endif
            @endif
            @endforeach
            @endforeach
            @endif
            @endforeach
        </table>
        @php
        $i = 0;
        @endphp

        @foreach($team_invites as $originTeam)
        @foreach($membres as $member)
        @if($member->user_id == Auth::user()->id && $member->activate == "true" && $member->team_id == $originTeam->id)

        Membre du groupe ({{$originTeam->membre}})

        @php
        $i++;
        @endphp
        @endif
        @endforeach
        @endforeach

        @if($i == 1)

        <table cellpadding="10%" class="table w-4" style="text-align:center">
            <tr class="">
                <td>

                </td>
                <td>
                    Pseudo
                </td>
                <td>
                    Email
                </td>
                <td>
                    Role
                </td>
                <td>
                    date d'entrer
                </td>
                <td>
                    Menu
                </td>
            </tr>
            @foreach($membres as $members)
            @foreach($team as $key)
            @php
            $date = strtotime($members->updated_at);
            $format = date('d/m/Y',$date);
            @endphp
            @if(!empty($members->user_id))
            <tr>
                <td>

                    @if(strlen($members->avatar) == 1)
                    <b style="border-radius:2em;font-weight:bold;">{{$members->avatar}}</b>
                    @else
                    <input type="image" src="{{asset('storage/'.$members->avatar)}}" style="border-radius:4em" alt="" width="50cm" height="50cm">
                    @endif
                </td>
                <td>
                    {{$members->pseudo}}
                </td>
                <td>
                    {{$members->email}}
                </td>
                <td>
                    {{$members->role}}
                </td>
                <td>
                    {{$format}}
                </td>
                @if($members->user_id == Auth::user()->id)
                <td>
                    (Vous)
                </td>
                @else
                <td>
                    Apropos
                </td>
                @endif
            </tr>
            @endif

            @endforeach
            @endforeach
        </table>
        @endif
    </center>
</div>