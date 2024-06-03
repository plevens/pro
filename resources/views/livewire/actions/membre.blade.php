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
        @endif
        @endforeach
        <table cellpadding="10%">
            <tr>
                <td>
                    Nom
                </td>
                <td>
                    Role
                </td>
                <td>
                    date d'entrer
                </td>
            </tr>
            @foreach($user as $users)
            @foreach($membres as $_membre)
            @if($_membre->auth_id == Auth::user()->id && !empty($_membre->user_id))
            @php
            $date = strtotime($_membre->created_at);
            $format = date('d/m/Y',$date);
            @endphp
            @if($users->id == $_membre->user_id)
            <tr>
                <td>

                    {{$users->name}}


                </td>
                <td>
                    {{$_membre->role}}
                </td>
                <td>
                    {{$format}}
                </td>

            </tr>
            @endif
            @endif
            @endforeach
            @endforeach
        </table>
    </center>
</div>