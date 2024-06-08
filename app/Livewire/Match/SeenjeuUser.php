<?php

namespace App\Livewire\Match;

use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\Hobbies_team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SeenjeuUser extends Component
{
    public function render()
    {
        $a = 0;
        $u = 0;
        $user = User::get();
        $gamestat = Gamestatut::get()->where('activate', 'true');
        $jeux = Hobbies_team::get()->where('status', 'true');
        $game = Game::get()->where('status', 'true');
        foreach ($game as $key) {
            if (Auth::user()->id == $key->auth_id) {
                $a++;
            }
        }
        foreach ($gamestat as $keys) {
            if (Auth::user()->id == $keys->user_id) {
                $u++;
            }
        }
        return view('livewire.match.seenjeu-user', compact('gamestat', 'jeux', 'game', 'user', 'a', 'u'));
    }
}
