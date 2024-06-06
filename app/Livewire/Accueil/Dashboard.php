<?php

namespace App\Livewire\Accueil;

use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $team = User::get();
        return view('livewire.accueil.dashboard', compact('team'));
    }
}
