<?php

namespace App\Livewire\Action;

use App\Models\Hobbies_perso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Jeux extends Component
{
    use  WithFileUploads;
    public string $nom = '';
    public $file;
    public $banniere;
    public string $description;
    public $jeux;
    public $n;
    public function render()
    {
        return view('livewire.action.jeux');
    }
    public function addgame(): void
    {
        $this->n  = 0;
        $this->jeux = Hobbies_perso::get();
        $this->validate([
            'nom' => 'required|string|max:255',
            'file' => 'image|max:2048',
            'banniere' => 'image|max:2048',
        ]);

        foreach ($this->jeux as $key) {
            if (strtolower($key->nom) ==  strtolower($this->nom) && $key->auth_id == Auth::user()->id) {
                $this->n++;
            }
        }
        if ($this->n == 1) {
            session()->flash('msg', 'here');
        } else {
            $this->banniere->store('public');
            $paths = $this->banniere->store();
            $this->file->store('public');
            $path = $this->file->store();
            if (empty($this->description)) {
                $desc = 'Jolie jeux';
            } else {
                $desc = $this->description;
            }
            DB::update('UPDATE `Hobbies_persos` SET `status` ="false" WHERE `auth_id` = "' . Auth::user()->id . '" AND `status` ="true" OR `auth_id` = "' . Auth::user()->id . '" AND `status` ="false"');
            Hobbies_perso::create([
                'auth_id' => Auth::user()->id,
                'nom' => $this->nom,
                'icon' => $path,
                'banniere' => $paths,
                'description' => $desc,
                'status' => 'true',
            ]);
            session()->flash('msg', 'ok');
        }
    }
}
