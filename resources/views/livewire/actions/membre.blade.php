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
        <b class="bg-warning text-white easy-out col h-3">! Vous avez supprimer un utilisateur du groupe</b>
        @endif
        <br>
        @foreach($team as $key)
        @if($key->auth_id == Auth::user()->id)
        Membre du groupe ({{$key->membre}})
        <br>
        <a href="{{route('membre.sup')}}" class="btn btn-primary"><img src="{{asset('icons/person-plus.svg')}}" alt="" srcset=""></a>

        <table cellpadding="5%" class="table w-2" style="text-align:center">
            <tr class="tr">
                <td>

                </td>
                <td id="td">
                    Pseudo
                </td>
                <td id="td">
                    Role
                </td>
                <td id="td">
                    date d'entrer
                </td>
                <td id="td">
                    date du demande
                </td>
                <td id="td">
                    Menu
                </td>
            </tr>
            @endif
            @endforeach

            @foreach($team as $key)
            @if($key->auth_id == Auth::user()->id)
            @foreach($membres as $_membre)
            <!-- commence -->
            @if(empty($_membre->user_id) && $_membre->accepted == 'waiting')
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
                    {{$_membre->role}}
                </td>
                <td>
                    en attente...
                </td>
                <td>
                    {{$formats}}
                </td>
                <td>
                    <b style="display:inline-block">

                        <a href="{{route('deletes.member',['id'=>$_membre->id])}}">
                            <input type="image" src="{{asset('icons/trash.svg')}}" alt="" srcset="">
                        </a>
                    </b>
                </td>

            </tr>
            @endif

            @foreach($user as $users)

            @if($_membre->auth_id == Auth::user()->id && $key->id == $_membre->team_id )
            @php
            $date = strtotime($_membre->updated_at);
            $format = date('d/m/Y',$date);

            $dates = strtotime($_membre->created_at);
            $formats = date('d/m/Y',$dates);
            @endphp
            @if($users->id == $_membre->user_id && $_membre->accepted == 'true')
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
                    {{$_membre->role}}
                </td>
                <td>

                    {{$_membre->updated_at->diffForHumans()}}
                </td>
                <td>

                    {{$_membre->created_at->diffForHumans()}}
                </td>
                <td>
                    <b style="display:inline-block">

                        @if($_membre->activate != 'bloque')
                        <a href="{{route('bloc.member',['id'=>$_membre->id])}}" wire:navigate>

                            <input type="image" src="{{asset('icons/person-slash.svg')}}" alt="" srcset="">

                        </a>
                        @else
                        <a href="{{route('debloc.member',['id'=>$_membre->id])}}" wire:navigate>
                            <input type="image" src="{{asset('icons/person-slash1.svg')}}" alt="" srcset="">
                        </a>
                        @endif
                        <a href="{{route('delete.member',['id'=>$_membre->id])}}">
                            <input type="image" src="{{asset('icons/trash.svg')}}" alt="" srcset="">
                        </a>
                    </b>
                </td>

            </tr>
            @endif



            <!-- termine -->
            @endif
            @endforeach
            @endforeach
            @endif
            
        </table>
        @endforeach
        @php
        $i = 0;
        $id = 0;
        @endphp
        @foreach($membres as $member)
        @if($member->user_id == Auth::user()->id && $member->activate == "true")
        @foreach($team_invites as $originTeam)
        @if($originTeam->id == $member->team_id)
        Membre du groupe ({{$originTeam->membre}})
        @php
        $id = $originTeam->id;
        @endphp
        @endif
        @endforeach
        @php
        $i++;
        @endphp
        @endif
        @endforeach
        @if($i == 1)
        <table cellpadding="10%" class="table w-4" style="text-align:center">
            <tr class="tr">
                <td>

                </td>
                <td id="td">
                    Pseudo
                </td>
                <td id="td">
                    Role
                </td>
                <td id="td">
                    date d'entrer
                </td>
                <td id="td">
                    date du demandeS
                </td>
                <td id="td">
                    Menu
                </td>
            </tr>

            @foreach($membres as $members)
            @if(!empty($members->user_id) && $members->team_id == $id)
            @php
            $date = strtotime($members->updated_at);
            $format = date('d/m/Y',$date);

            $dates = strtotime($members->created_at);
            $formats = date('d/m/Y',$dates);
            @endphp

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
                    {{$members->role}}
                </td>
                <td>
                    {{$members->updated_at->diffForHumans()}}
                </td>
                <td>
                    {{$formats}}
                </td>
                @if($members->user_id == Auth::user()->id)
                <td>
                    <a href="{{route('avatar.pseudo')}}" wire:navigate> <input type="image" src="{{asset('icons/pen.svg')}}" alt="" srcset=""> </a>
                </td>
                @else
                <td>
                    Apropos
                </td>
                @endif
            </tr>
            @endif
            @endforeach
        </table>
        @endif
    </center>
</div>