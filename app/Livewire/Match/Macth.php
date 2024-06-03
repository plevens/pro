<?php

namespace App\Livewire\Match;

use App\Livewire\Nav\Navigate;
use App\Models\Game;
use App\Models\Hobby;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Macth extends Component
{
    use  WithFileUploads;
    public string $nom = '';
    public string $description = '';
    public $file;
    public $jeu;
    public $n;
    public $i;
    public $id;
    public $hobbies;

    public function render()
    {
        return view('livewire.match.macth');
    }

    public function startGame()
    {
          $this->validate([
            'nom'=>'required',
            'description'=>'required',
        ]);

        if (empty($this->file)) {
            $path = $this->file = $this->nom[0];
        } else {
            $this->validate([
                'file' => 'image|max:2048|min:0',
            ]);
            $this->file->store('public');
            $path = $this->file->store();
        }

        $this->jeu = Game::get();
        $this->hobbies = Hobby::get();


        foreach ($this->jeu as $key) {
           if ($key->auth_id == Auth::user()->id) {    
               $this->n++;
               $this->id = $key->id;       
           }
        }

        foreach ($this->hobbies as $keys) {
            foreach ($this->jeu as $key) {
                if ($key->auth_id == Auth::user()->id && $keys->game_id == $key->id) {
                    $this->i++;
                }
            }
        }

        if($this->n >= 1 && $this->i == 0){
            Hobby::create([
                'game_id' => $this->id,
                'auth_id' => Auth::user()->id,
                'nom' => $this->nom,
                'icon' => $path,
                'description' => $this->description,
                'banniere' => 'jkjjkjkjk',
                ]);
            session()->flash('status','200');
            $this->redirect('/team/game', navigate: true);
        }else{
            session()->flash('status','401');
            $this->redirect('/team/game', navigate: true);
        }
    }
}
