<?php

namespace App\Livewire\Match;

use App\Models\Hobbies_perso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class JeuPerso extends Component
{
    use  WithFileUploads;
    public string $nom = "";
    public string $description = "";
    public $file;
    public $banniere;

    public function render()
    {
        return view('livewire.match.jeu-perso');
    }

    public function jeux()
    {
        return view('add_jeuPerso');
    }

    public function addgame(): void
    {
        $this->validate([
            'nom' => 'required',
            'banniere' => 'required',
            'description' => 'required',
        ]);

        $this->banniere->store('public');
        $ban = $this->banniere->store();

        if (empty($this->file)) {
            $path = $this->file = $this->nom[0];
        } else {
            $this->validate([
                'file' => 'image|max:2048|min:0',
            ]);
            $this->file->store('public');
            $path = $this->file->store();
        }

        Hobbies_perso::create([
            'auth_id' => Auth::user()->id,
            'nom' => $this->nom,
            'icon' => $path,
            'description' => $this->description,
            'banniere' => $ban,
            'status' => 'true',
        ]);
        session()->flash('stat', '200');
        $this->redirect('/ajouter/jeu personnel/', navigate: true);
    }

    public function suppressionPerso(Hobbies_perso $id)
    {
        $id->update();
        DB::update('UPDATE `Hobbies_persos` SET `status` = "false" WHERE `auth_id` = "' . $id->auth_id . '" AND `id` = "' . $id->id . '" ');
        return back();
    }

    public function restaurerPerso(Hobbies_perso $id)
    {
        $id->update();
        DB::update('UPDATE `Hobbies_persos` SET `status` = "true" WHERE `auth_id` = "' . $id->auth_id . '" AND `id` = "' . $id->id . '"  ');
        return back();
    }

    public function suppdefinitiveP(Hobbies_perso $id)
    {
        $id->delete();
        DB::delete('DELETE FROM `hobbies_persos` WHERE `auth_id` = "' . $id->auth_id . '" AND `id` = "' . $id->id . '"  ');
        return back();
    }
}
