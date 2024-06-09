<?php

namespace App\Livewire\Nav;

use App\Models\Hobbies_perso;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Jeu extends Component
{
    public $jeu;
    public $jeux;
    public $nbr;
    public $nom;
    public $icon;
    public $banniere;
    public function mount()
    {
        $this->nbr = 0;
        $this->jeu = Hobbies_perso::get();
        $this->jeux = Hobbies_perso::get()->where('status', 'true');
        foreach ($this->jeux as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->nbr++;
                $this->nom = $key->nom;
                $this->icon = $key->icon;
                $this->banniere = $key->banniere;
            }
        }
    }
    public function render()
    {
        return view('livewire.nav.jeu');
    }
}
