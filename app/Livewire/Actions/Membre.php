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
    public $team_invite;
    public $team_invites;
    public function mount()
    {
        $this->team = Game::get()->where('status', 'true');
        $this->membres = Gamestatut::get();
        $this->team_invite = Gamestatut::get()->where('activate', 'true');
        $this->team_invites = Game::get();

        $this->user = User::get();
    }
    public function render()
    {
        return view('livewire.actions.membre');
    }
}
