<?php

namespace App\Livewire\Team;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListeTeam extends Component
{
    public $team;
    public $n;
    public function render()
    {
        $game = Game::orderBy('status', 'desc')->get();
        return view('livewire.team.liste-team', compact('game'));
    }
}
