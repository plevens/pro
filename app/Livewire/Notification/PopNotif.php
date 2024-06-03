<?php

namespace App\Livewire\Notification;

use App\Models\Gamestatut;
use Livewire\Component;

class PopNotif extends Component
{
    public $team_notif;
    public function mount()
    {
        $this->team_notif = Gamestatut::get()->where('accepted', 'waiting');
    }
    public function render()
    {
        return view('livewire.notification.pop-notif');
    }
}
