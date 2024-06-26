<?php

use App\Livewire\Team\DeleteGame;
use Livewire\Volt\Component;

new class extends Component
{
    public DeleteGame $delete;
}

?>

<div>
    <center>
        @if($ids == Auth::user()->id)

        <h3 id="suppression_du_groupe">
            Suppression du groupe
        </h3>
        <a href="{{route('supprime.game',['id'=>$id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">
            <br>

            <button id="Supprimer">
                Supprimer
            </button>
        </a>

        @endif
        <br>
        @if($users == Auth::user()->id)
        <h2>Vous etes dans le groupe</h2>
        <a href="{{route('exit.team',['id'=>$_team_id])}}" wire:navigate>
            <x-danger-button>
                Quitter le groupe
            </x-danger-button>
        </a>
        @endif
    </center>
</div>