<?php

namespace App\Livewire\Team;

use App\Models\Game;
use App\Models\Gamestatut;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class NameUpdate extends Component
{
    use WithFileUploads;
    public $nom;
    public $icon;
    public $img;
    public $id;
    public $game;
    public $_game;
    public $p;
    public $f;
    public $imgs;
    public function mount()
    {
        $this->p = 0;
        $this->f = 0;
        $this->game = Game::get()->where('status', 'true');
        $this->_game = Gamestatut::get()->where('activate', 'true');
        foreach ($this->game as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->nom = $key->nom;
                $this->icon = $key->icon;
                $this->id = $key->id;
                $this->p++;
                $this->imgs = $key->icon;
            }
        }

        foreach ($this->_game as $keys) {
            if ($keys->user_id == Auth::user()->id) {
                $this->nom = $keys->pseudo;
                $this->icon = $keys->avatar;
                $this->id = $keys->id;
                $this->imgs = $key->icon;
                $this->f++;
            }
        }
    }

    public function render()
    {

        return view('livewire.team.name-update');
    }
    public function updateName(): void
    {
        $this->validate([
            'nom' => 'required|string|max:20|min:3',
            'id' => 'required'
        ]);
        if (empty($this->img)) {
            $path = $this->imgs;
        } else {
            $image = $this->img;
            $image->store('public');
            $path = $image->store();
        }
        DB::update('UPDATE `games` SET `nom` ="' . $this->nom . '", `icon`= "' . $path . '"  WHERE `id` = "' . $this->id . '"');
    }
    public function updateProfile(): void
    {
        $this->validate([
            'nom' => 'required|string|max:20|min:3',
            'id' => 'required'
        ]);
        if (empty($this->img)) {
            $path = $this->imgs;
        } else {
            $image = $this->img;
            $image->store('public');
            $path = $image->store();
        }
        DB::update('UPDATE `gamestatuts` SET `pseudo` ="' . $this->nom . '" , `avatar` ="' . $path . '" WHERE `id`="' . $this->id . '"');
    }
    public function bloquer(Gamestatut $id)
    {
        $id->update([
            'activate' => 'bloque',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return back();
    }
    public function debloquer(Gamestatut $id)
    {
        $id->update([
            'activate' => 'true',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return back();
    }
}
