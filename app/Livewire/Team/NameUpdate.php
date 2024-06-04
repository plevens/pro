<?php

namespace App\Livewire\Team;

use App\Models\Game;
use App\Models\Gamestatut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class NameUpdate extends Component
{
    use WithFileUploads;
    public Game $nom;
    public Game $id;
    public $name;
    public function render()
    {
        $game = Game::get()->where('status', 'true');
        $_game = Gamestatut::get()->where('activate', 'true');
        return view('livewire.team.name-update', compact('game', '_game'));
    }
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'id' => 'required'
        ]);
        if (empty($request->file('file'))) {
            $path = $request->image;
        } else {
            $image = $request->file('file');
            $image->store('public');
            $path = $image->store();
        }
        DB::update('UPDATE `games` SET `nom` ="' . $request->name . '", `icon`= "' . $path . '"  WHERE `id` = "' . $request->id . '"');
        return back();
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|string|max:20|min:3',
            'id' => 'required'
        ]);
        if (empty($request->file('file'))) {
            $path = $request->image;
        } else {
            $image = $request->file('file');
            $image->store('public');
            $path = $image->store();
        }
        DB::update('UPDATE `gamestatuts` SET `pseudo` ="' . $request->pseudo . '" , `avatar` ="' . $path . '" WHERE `id`="' . $request->id . '"');
        return back();
    }
}
