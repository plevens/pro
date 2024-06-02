<?php

namespace App\Livewire\Team;

use App\Models\Game;
use Livewire\Component;

class MyTeam extends Component
{
    public function render()
    {
        $team = Game::get()->where('status', 'true');
        return view('livewire.team.my-team', compact('team'));
    }
}
