<?php

namespace App\Livewire\Team;

use App\Models\Game;
use App\Models\Gamestatut;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dash extends Component
{


    public function render()
    {
        $game = Game::get()->where('status', 'true');
        $_team = Gamestatut::get()->where('activate', 'true');
        $n = 0;
        $i = 0;
        foreach ($game as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $n++;
            }
        }
        foreach ($_team as $_key) {
            if ($_key->user_id == Auth::user()->id) {
                $i++;
            }
        }
        return view('livewire.team.dash', compact('i', 'n', 'game', '_team'));
    }
}
