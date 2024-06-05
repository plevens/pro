<?php

namespace App\Livewire\Match;

use App\Livewire\Nav\Navigate;
use App\Models\Game;
use App\Models\Hobby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public $e;
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
           if ($key->auth_id == Auth::user()->id && $key->status == 'true') {    
               $this->n++;
               $this->id = $key->id;       
           }
        }

        

        foreach ($this->hobbies as $keys) {
            foreach ($this->jeu as $key) {
                if ($keys->auth_id == Auth::user()->id && $keys->game_id == $key->id && $key->status == 'true' && $keys->status == 'true') {
                    $this->i++;
                }
            }
        }

        foreach ($this->hobbies as $keys) {
            foreach ($this->jeu as $key) {
                if ($keys->auth_id == Auth::user()->id && $keys->game_id == $key->id && $key->status == 'true' && $keys->status == 'false') {
                    $this->e++;
                }
            }
        }



        if($this->n >= 1 && $this->i == 0 && $this->e == 0){
            Hobby::create([
                'game_id' => $this->id,
                'auth_id' => Auth::user()->id,
                'nom' => $this->nom,
                'icon' => $path,
                'description' => $this->description,
                'banniere' => 'jkjjkjkjk',
                'status' => 'true'
                ]);
            session()->flash('stat','200');
            $this->redirect('/team/game', navigate: true);
        }elseif($this->i >=1){
            session()->flash('stat','401');
            $this->redirect('/team/game', navigate: true);
        }elseif($this->e >=1) {
            session()->flash('stat','402');
            $this->redirect('/team/game', navigate: true);
        }
    }

    public function suppression(Hobby $id)
    {
        $id->update();
        DB::update('UPDATE `hobbies` SET `status` = "false" WHERE `game_id` = "'.$id->game_id.'"');
        return back();
    }

    public function suppdefinitive(Hobby $id)
    {
        $id->delete();
        DB::delete('DELETE FROM `hobbies` WHERE `game_id` = "'.$id->game_id.'"');
        return back();
    }

    public function restaurejeu(Hobby $id)
    {
        $id->update();
        DB::update('UPDATE `hobbies` SET `status` = "true" WHERE `game_id` = "'.$id->game_id.'"');
        return back();
    }

}
