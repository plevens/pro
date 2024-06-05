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
        <h3 id="Suppression_du_jeux">
            Suppression du jeux
        </h3>
        <a href="{{route('supprime.game',['id'=>$id])}}" class="bg-danger" onclick="if(confirm('Voulez-vous vraiment supprimer votre groupe ?')){}else return false;">
           <br>
           
        <button id="Supprimer">
                Supprimer
            </button>
        </a>
    </center>
</div>