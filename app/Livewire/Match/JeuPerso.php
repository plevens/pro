<?php

namespace App\Livewire\Match;

use Livewire\Component;

class JeuPerso extends Component
{
    public function render()
    {
        return view('livewire.match.jeu-perso');
    }

    public function jeux()
    {
        return view('add_jeuPerso');
    }
}
