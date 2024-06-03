<?php

namespace App\Livewire\Nav;

use App\Models\Game;
use App\Models\Gamestatut;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Navigate extends Component

{
    public $team;
    public $team_invitate;
    public $n;
    public Game $identifiant;
    public Game $image;
    protected $rules =
    [
        'identifiant.id' => 'required'
    ];
    public $status;



    public function mount()
    {
        $this->team = Game::get();
        $this->team_invitate = Gamestatut::get();
        foreach ($this->team as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $this->n++;
            }
        }

        foreach ($this->team_invitate as $keys) {
            if ($keys->user_id == Auth::user()->id) {
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
