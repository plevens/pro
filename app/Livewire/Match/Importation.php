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
    public $jeux;
    public function render()
    {
        $game = Hobbies_perso::get();
        return view('livewire.match.importation', compact('game'));
    }

    public function addGame(): void
    {
        $this->n = 0;
        $this->i = 0;
        $this->jeux = Hobbies_team::get();
        $this->game = Hobbies_perso::get();
        $this->team = Game::get();
        $this->teams = Game::get();

        foreach ($this->game as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->nom = $key->nom;
                $this->icon = $key->icon;
                $this->banniere = $key->banniere;
                $this->description = $key->description;
            }
        }

        foreach ($this->team as $keys) {
            if ($keys->auth_id == Auth::user()->id) {
                $this->team = $keys->id;
            }
        }

        foreach ($this->teams as $key) {
            foreach ($this->jeux as $jeu) {
                if ($jeu->auth_id == Auth::user()->id && $jeu->team_id == $key->id && $jeu->status == 'true' && $key->status == 'true') {
                    $this->n++;
                }
            }
        }

        foreach ($this->teams as $key) {
            foreach ($this->jeux as $jeu) {
                if ($jeu->auth_id == Auth::user()->id && $jeu->team_id == $key->id && $jeu->status == 'false' && $key->status == 'true') {
                    $this->i++;
                }
            }
        }

        if ($this->i == 0 && $this->n == 0) {
            Hobbies_team::create([
                'team_id' => $this->team,
                'auth_id' => Auth::user()->id,
                'nom' => $this->nom,
                'icon' => $this->icon,
                'description' => $this->description,
                'banniere' => $this->banniere,
                'status' => 'true'
            ]);
            session()->flash('stat', '200');
            $this->redirect('/team/game', navigate: true);
        } elseif ($this->n >= 1) {
            session()->flash('stat', '401');
            $this->redirect('/team/game', navigate: true);
        } elseif ($this->i >= 1) {
            session()->flash('stat', '402');
            $this->redirect('/team/game', navigate: true);
        }
    }
}
