<?php

namespace App\Livewire\Match;

use App\Models\Hobbies_perso;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Updategameperso extends Component
{
    use  WithFileUploads;
    public $nom;
    public $icon;
    public $banniere;
    public $description;
    public $ids;


    public function mount()
    {
        $this->team = Hobbies_perso::get();
        foreach ($this->team as $key) {
            if ($key->auth_id = Auth::user()->id && $key->status = 'true') {
                $this->nom = $key->nom;
                $this->icon = $key->icon;
                $this->banniere = $key->banniere;
                $this->description = $key->description;
            }
        }
    }
    public function render(Hobbies_perso $id)
    {
        $ids = $id->id;
        $game = Hobbies_perso::get()->where('id', 'ids');
        return view('livewire.match.updategameperso', compact('game', 'ids'));
    }
}
