<?php

namespace App\Livewire\Includes;

use App\Models\Game;
use App\Models\Gamestatut;
use Livewire\Component;

class Includes extends Component
{
    public $game;
    public $_team;
    public function mount()
    {
        $this->game = Game::get()->where('status', 'true');
        $this->_team = Gamestatut::get()->where('activate', 'true');
    }
    public function render()
    {
        return view('livewire.includes.includes');
    }
}
