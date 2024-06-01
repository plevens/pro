<?php

namespace App\View\Components;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $team = Game::get();
        $n = 0;
        foreach ($team as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $n++;
            }
        }
        return view('layouts.app', compact('n', 'team'));
    }
}
