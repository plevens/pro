<?php

namespace App\Livewire\Actions;

use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\User;
use Livewire\Component;

class Membre extends Component
{
    public $team;
    public $membres;
    public $user;
    public function mount()
    {
        $this->team = Game::get()->where('status', 'true');
        $this->membres = Gamestatut::get();
        $this->user = User::get();
    }
    public function render()
    {
        return view('livewire.actions.membre');
    }
}
