<?php

namespace App\Livewire\Match;

use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Seengame extends Component
{
    public function render()
    {
        $user = User::get();
        $gamestatus = Gamestatut::get();
        $game = Game::get();
        $auth_id = Auth::user()->id;
        $jeux = Hobby::get();
        return view('livewire.match.seengame',compact('jeux','auth_id','game','gamestatus','user'));
    }
}
