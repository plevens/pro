<?php

namespace App\Livewire\Sms;

use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\Msg;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Message extends Component
{
  public string $text = "";
  public function render()
  {
    $n = 0;
    $gamestat = Gamestatut::get();
    $user = User::get();
    $auth_id = Auth::user()->id;
    $game = Game::get()->where('status', 'true');
    $sms = Msg::get();

    return view('livewire.sms.message', compact('sms', 'game', 'auth_id', 'user'));
  }

  public function texto(): void
  {
    $this->stat = Gamestatut::get();
    $this->jeu = Game::get()->where('status', 'true');

    foreach ($this->stat as $key) {
      foreach ($this->jeu as $keys) {
        if ($key->id == $keys->team_id && $keys->user_id == Auth::user()->id) {
          $team_id = $keys->team_id;
        } elseif ($key->auth_id == Auth::user()->id) {
          $team_id = $keys->team_id;
        }
      }
    }
    $this->validate([
      'text' => 'required'
    ]);

    Msg::create([
      'team_id' => $team_id,
      'auth_id' => Auth::user()->id,
      'message' => $this->text
    ]);

    $this->redirect('/team/message', navigate: true);
  }
}
