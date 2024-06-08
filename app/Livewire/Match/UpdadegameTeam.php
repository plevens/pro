<?php

namespace App\Livewire\Match;

use App\Models\Hobbies_team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;


class UpdadegameTeam extends Component

{
    use  WithFileUploads;

    public $nom;
    public $icon;
    public $icons;
    public $banniere;
    public $description;
    public $ids;
    public $game;
    public $team;
    public $bann;
    public $i;

    public function mount()
    {
        $this->i = 0;
        $this->team = Hobbies_team::get()->where('status', 'true');
        foreach ($this->team as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->nom = $key->nom;
                $this->i++;
                $this->icons = $key->icon;
                $this->bann = $key->banniere;
                $this->description = $key->description;
            }
        }
    }

    public function render()
    {
        return view('livewire.match.updadegame-team');
    }
    public function updateGame(): void
    {
        $this->ids = Auth::user()->id;

        $this->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);
        if (empty($this->banniere)) {
            $paths = $this->bann;
        } else {
            $this->validate([
                'banniere' => 'image|max:2048|min:0',
            ]);
            $this->banniere->store('public');
            $paths = $this->banniere->store();
        }


        if (empty($this->icon)) {
            $path = $this->icons;
        } else {
            $this->validate([
                'icon' => 'image|max:2048|min:0',
            ]);
            $this->icon->store('public');
            $path = $this->icon->store();
        }

        DB::update('UPDATE `Hobbies_teams` SET `nom`="' . $this->nom . '" , `icon` = "' . $path . '" , `banniere`= "' . $paths . '" , `description` = "' . $this->description . '" WHERE `auth_id` = "' . $this->ids . '"  ');


        $this->redirect('/seen/game/team', navigate: true);
    }
}
