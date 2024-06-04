<?php

namespace App\Livewire\Notification;

use App\Models\Gamestatut;
use Livewire\Component;

class PopNotif extends Component
{
    public function render()
    {
        $team_notif = Gamestatut::get()->where('accepted', 'waiting');
        return view('livewire.notification.pop-notif', compact('team_notif'));
    }
}
