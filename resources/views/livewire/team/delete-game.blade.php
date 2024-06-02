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
        <h3>
            Suppression du jeux
        </h3>
        <a href="{{route('supprime.game',['id'=>$id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">
            <x-danger-button>
                Supprimer
            </x-danger-button>
        </a>
    </center>
</div>