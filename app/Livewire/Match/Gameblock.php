<?php

namespace App\Livewire\Match;

use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\Hobbies_team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gameblock extends Component
{
    public function render()
    {
        $user = User::get();
        $gamestatus = Gamestatut::get();
        $game = Game::get();
        $auth_id = Auth::user()->id;
        $jeux = Hobbies_team::get();
        return view('livewire.match.gameblock', compact('jeux', 'auth_id', 'game', 'gamestatus', 'user'));
    }
}
