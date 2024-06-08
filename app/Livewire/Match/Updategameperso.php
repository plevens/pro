<?php

namespace App\Livewire\Match;

use App\Models\Hobbies_perso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Updategameperso extends Component
{
    use  WithFileUploads;
    public $nom;
    public $icon;
    public $icons;
    public $banniere;
    public $description;
    public $bannieres;
    public $id;
    public $auth;
    public $game;


    public function mount()
    {
        $this->team = Hobbies_perso::get();
        foreach ($this->team as $key) {
            if ($key->auth_id = Auth::user()->id && $key->status = 'true') {
                $this->nom = $key->nom;
                $this->icons = $key->icon;
                $this->bannieres = $key->banniere;
                $this->description = $key->description;
            }
        }
    }
    public function render()
    {
        $game = Hobbies_perso::get();
        return view('livewire.match.updategameperso', compact('game'));
    }

    public function updateGame(Hobbies_perso $id)
    {
        $id->update();
        $this->game = Hobbies_perso::get();
        $this->auth = Auth::user()->id;

        $this->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        if (empty($this->banniere)) {
            $paths = $this->bannieres;
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

        DB::update('UPDATE `Hobbies_persos` SET `nom`= "' . $this->nom . '" , `icon` = "' . $path . '" , `banniere`= "' . $paths . '" , `description` = "' . $this->description . '" WHERE `auth_id` ="' . $this->auth . '"   ');

        $this->redirect('/voir/jeu personnel', navigate: true);
    }
}
