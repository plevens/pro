<?php

namespace App\Livewire\Nav;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigate extends Component

{
    public $team;
    public $n;

    public function mount()
    {
        $this->team = Game::get();
        foreach ($this->team as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->n++;
            }
        }
    }
    public function render()
    {

        return view('livewire.nav.navigate');
    }
}
