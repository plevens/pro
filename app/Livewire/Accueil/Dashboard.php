<?php

namespace App\Livewire\Accueil;

use App\Models\Game;
use App\Models\Gamestatut;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $team = Game::get();
        $team_add = Gamestatut::get();
        return view('livewire.accueil.dashboard', compact('team', 'team_add'));
    }
}
