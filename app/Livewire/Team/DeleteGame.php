<?php

namespace App\Livewire\Team;

use App\Models\Game;
use App\Models\Gamestatut;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeleteGame extends Component
{
    public $id;
    public $ids;
    public function mount(): void
    {
        $idgame = Game::get()->where('status', 'true');

        foreach ($idgame as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->id = $key->id;
                $this->ids = $key->auth_id;
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
        DB::delete('DELETE FROM `gamestatuts` WHERE `team_id` ="' . $id->id . '"');
        return redirect('/team');
    }
    public function suppression(Gamestatut $id)
    {
        $id->delete();
        $team = Game::get();
        $nbr = 0;
        $ids = 0;
        foreach ($team as $key) {
            if ($key->id == $id->team_id) {
                $nbr = $key->membre;
                $ids = $key->id;
            }
        }
        DB::update('UPDATE `games` SET `membre` ="' . ($nbr - 1) . '" WHERE `id` = "' . $id->team_id . '"');
        session()->flash('msg', $ids);
        return redirect('/team');
    }
    public function suppressions(Gamestatut $id)
    {
        $id->delete();
        $team = Game::get();
        $nbr = 0;
        $ids = 0;
        foreach ($team as $key) {
            if ($key->id == $id->team_id) {
                $nbr = $key->membre;
                $ids = $key->id;
            }
        }
        DB::update('UPDATE `games` SET `membre` ="' . ($nbr - 1) . '" WHERE `id` = "' . $id->team_id . '"');
        session()->flash('msg', $ids);
        return back();
    }
}
