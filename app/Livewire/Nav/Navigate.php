<?php

namespace App\Livewire\Nav;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Navigate extends Component

{
    public $team;
    public $n;
    public Game $identifiant;
    public Game $image;
    protected $rules =
    [
        'identifiant.id' => 'required'
    ];
    public $status;



    public function mount()
    { // Le chemin vers ton image
        $this->team = Game::get();
        foreach ($this->team as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->n++;
            }
        }
    }
    public function render()
    {

        return view('livewire.nav.navigate');
    }

    public function change(Game $id)

    {

        DB::update('UPDATE `games` SET `status` ="false" WHERE `auth_id` = "' . Auth::user()->id . '" ');
        DB::update('UPDATE `games` SET `status` ="true" WHERE `auth_id` = "' . Auth::user()->id . '" AND `id` = "' . $id->id . '"');
        return back();
    }
}
