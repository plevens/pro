<?php

use App\livewire\Match\JeuPerso;
use Livewire\Volt\Component;

new class extends Component
{
    public JeuPerso $jeu;
}

?>
<div>
    <a href="{{route('addjeuPerso')}}" wire:navigate>
        Ajouter un jeu
    </a>
    <br>
    <a href="">
        Voir mon jeu
    </a>
</div>