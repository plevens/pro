<?php

namespace App\Livewire\Match;

use App\Models\Game;
use App\Models\Hobbies_perso;
use App\Models\Hobbies_team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Importation extends Component
{
    use  WithFileUploads;
    public $nom;
    public $icon;
    public $banniere;
    public $description;
    public $team;
    public $teams;
    public $id;
    public $ids;
    public $jeux;
    public $game;
    public $i;
    public $n;
    public $e;
    public $f;
    public $t;
    public function mount()
    {
        $this->n = 0;
        $this->i = 0;
        $this->e = 0;
        $this->f = 0;
        $this->t = 0;
        $this->jeux = Hobbies_team::get();
        $this->game = Hobbies_perso::get();
        $this->team = Game::get();
        $this->teams = Game::get();
        foreach ($this->game as $key) {
            if ($key->auth_id == Auth::user()->id && $key->status == 'true') {
                $this->n++;
                $this->nom = $key->nom;
                $this->icon = $key->icon;
                $this->banniere = $key->banniere;
                $this->description = $key->description;
            }
        }

        foreach ($this->team as $keys) {
            if ($keys->auth_id == Auth::user()->id && $keys->status == 'true') {

                $this->id = $keys->id;
            }
        }
        foreach ($this->jeux as $_key) {
            if ($_key->auth_id == Auth::user()->id && $this->id == $_key->team_id && $_key->nom == $this->nom) {
                $this->t++;
                $this->ids = $_key->team_id;
            } elseif ($_key->auth_id == Auth::user()->id && $this->id == $_key->team_id && $_key->nom != $this->nom) {
                $this->i++;
            }
        }
    }
    public function render()
    {
        return view('livewire.match.importation');
    }

    public function addGame(): void
    {


        foreach ($this->jeux as $_key) {
            if ($_key->auth_id == Auth::user()->id && $_key->team_id == $this->id) {
                $this->e++;
            }
        }



        if ($this->e <= 0) {
            Hobbies_team::create([
                'team_id' => $this->id,
                'auth_id' => Auth::user()->id,
                'nom' => $this->nom,
                'icon' => $this->icon,
                'description' => $this->description,
                'banniere' => $this->banniere,
                'status' => 'true'
            ]);
            session()->flash('stat', '200');
            $this->redirect('/team/game', navigate: true);
        } else {
            session()->flash('stat', '402');
            $this->redirect('/team/game', navigate: true);
        }
    }
}
