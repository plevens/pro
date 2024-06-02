<?php

namespace App\Livewire\Team;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeleteGame extends Component
{
    public $id;
    public function mount(): void
    {
        $idgame = Game::get()->where('status', 'true');

        foreach ($idgame as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->id = $key->id;
            }
        }
    }
    public function render()
    {
        return view('livewire.team.delete-game');
    }
    public function supprimer(Game $id)
    {
        $id->delete();
        return redirect('/team');
    }
}
