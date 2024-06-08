<?php

namespace App\Livewire\Match;

use App\Models\Hobbies_perso;
use Livewire\Component;

class GamePblock extends Component
{
    public function render()
    {
        $game = Hobbies_perso::get();
        return view('livewire.match.game-pblock', compact('game'));
    }
}
