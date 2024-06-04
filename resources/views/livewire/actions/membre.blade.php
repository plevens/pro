<?php

use App\Livewire\Actions\Membre;
use Livewire\Volt\Component;

new class extends Component
{
    public Membre $teams;
}

?>
<div>
    <center>
        @foreach($team as $key)
        @if($key->auth_id == Auth::user()->id)
        Membre du groupe ({{$key->membre}})

        <table cellpadding="10%" style="text-align:center">
            <tr>
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

                    <a href="">
                        <x-primary-button>
                            Modifier
                        </x-primary-button>
                    </a>
                    <br>
                    <a href="">
                        <x-danger-button>
                            Bloquer
                        </x-danger-button>
                    </a>
                    <a href="">
                        <x-danger-button>
                            Supprimer
                        </x-danger-button>
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
        @php
        $i++;
        @endphp
        @endif
        @endforeach
        @endforeach

        @if($i == 1)

        <table cellpadding="10%" style="text-align:center">
            <tr>
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
            <tr>
                <td>

                    @if(strlen($members->avatar) == 1)
                    <b style="background-color:cadetblue;border-radius:2em;padding:20px 20px ;font-weight:bold;">{{$members->avatar}}</b>
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
            </tr>
            @endif
            @endforeach
            @endforeach
        </table>
        @endif
    </center>
</div>