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
            @if($_membre->auth_id == Auth::user()->id && !empty($_membre->user_id))
            @php
            $date = strtotime($_membre->updated_at);
            $format = date('d/m/Y',$date);
            @endphp
            @if($users->id == $_membre->user_id)
            <tr>
                <td style="background-color:cadetblue;border-radius:2em;padding:20px 20px ;font-weight:bold;">
                    {{$_membre->avatar}}

                </td>
                <td>

                    {{$_membre->pseudo}}


                </td>
                <td>
                    {{$_membre->role}}
                </td>
                <td>
                    {{$format}}
                </td>
                <td>
                    <a href="">
                        <x-danger-button>
                            Supprimer
                        </x-danger-button>
                    </a>
                    <a href="">
                        <x-primary-button>
                            Modifier
                        </x-primary-button>
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
    </center>
</div>