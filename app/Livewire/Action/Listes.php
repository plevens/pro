<?php

namespace App\Livewire\Action;

use App\Models\Hobbies_perso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Listes extends Component
{
    public $jeux;
    public $n;
    public $nom;
    public $icon;
    public $description;
    public $banniere;
    public $file;
    public $files;
    public function mount()
    {
        $this->jeux = Hobbies_perso::orderBy('status', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.action.listes');
    }
    public function activeJeux(Hobbies_perso $id)
    {
        DB::update('UPDATE `hobbies_persos` SET `status` ="false" WHERE `auth_id` ="' . Auth::user()->id . '" AND `status` = "true"');
        $id->update([
            'status' => 'true'
        ]);
        return back();
    }
    public function bloqueJeux(Hobbies_perso $id)
    {
        $id->update([
            'status' => 'bloc'
        ]);
        DB::delete('DELETE FROM `hobbies_teams` WHERE `auth_id`="' . Auth::user()->id . '" AND `nom` ="' . $id->nom . '"');
        session()->flash('msg', $id->nom);
        return back();
    }
    public function restaure(Hobbies_perso $id)
    {
        $id->update([
            'status' => 'false'
        ]);
        session()->flash('msg', $id->nom);
        return back();
    }
    public function modifJeux(Hobbies_perso $id)
    {
        $nom = $id->nom;
        $description = $id->description;
        if (empty($id->icon)) {
            $icons = "";
        } else {
            $icons = $id->icon;
        }
        if (empty($id->banniere)) {
            $bannieres = "";
        } else {
            $bannieres = $id->banniere;
        }
        return view('modification_jeux', compact('nom', 'icons', 'bannieres', 'description', 'id'));
    }
    public function updated(Hobbies_perso $id, Request $request)
    {
        if (empty($request->nom) || empty($request->description)) {
            session()->flash('msg', 'empty');
        } else {
            DB::update('UPDATE`hobbies_teams` SET `nom` ="' . $request->nom . '", `description`="' . $request->description . '" WHERE `auth_id`="' . Auth::user()->id . '" AND `nom` ="' . $id->nom . '"');

            $id->update([
                'nom' => $request->nom,
                'descriprion' => $request->description
            ]);
        }


        return back();
    }
}
