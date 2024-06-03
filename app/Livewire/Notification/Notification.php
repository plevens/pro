<?php

namespace App\Livewire\Notification;

use App\Models\Game;
use App\Models\Gamestatut;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Notification extends Component
{
    public $team;
    public $_team;
    public function mount()
    {
        $this->team = Gamestatut::get()->where('accepted', 'waiting');
        $this->_team = Game::get();
    }
    public function render()
    {
        return view('livewire.notification.notification');
    }
    public function accepteInvitation(Gamestatut $id)
    {
        $id->update([
            'accepted' => 'true',
            'activate' => 'true',
        ]);
        $team = Game::get();
        $ids = 0;
        $nbr = 0;

        foreach ($team as $key) {
            if ($key->id == $id->team_id) {
                $ids = $key->id;
                $nbr = $key->membre;
            }
        }
        DB::update('UPDATE `games` SET `membre` ="' . ($nbr + 1) . '" WHERE `id` ="' . $ids . '"');
        DB::update('UPDATE `games` SET `status` ="false" WHERE `auth_id` = "' .  Auth::user()->id . '"');
        return back();
    }
}
