<?php

namespace App\Livewire\Team;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NameUpdate extends Component
{
    public Game $nom;
    public Game $id;
    public $name;
    public function render()
    {
        $game = Game::get()->where('status', 'true');
        return view('livewire.team.name-update', compact('game'));
    }
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|min:5',
            'id' => 'required'
        ]);
        DB::update('UPDATE `games` SET `nom` ="' . $request->name . '" WHERE `id` = "' . $request->id . '"');
        return back();
    }
}
