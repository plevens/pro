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
      $user = User::get();
      $auth_id = Auth::user()->id;
      $game = Game::get();
      $sms = Msg::get();
        return view('livewire.sms.message',compact('sms','game','auth_id','user'));
    }

    public function texto(): void
    {
      $this->stat = Gamestatut::get();
      $this->jeu = Game::get();
      foreach ($this->jeu as $key) {
        foreach ($this->stat as $keys) {
          if ($key->status == 'true' && $key->id == $keys->team_id) {
            $team_id = $key->id;
          }
          elseif ($key->status == 'true' && $key->id != $keys->team_id && $key->auth_id == Auth::user()->id) {
            $team_id = $key->id;
          }
        }
      }
      $this->validate([
        'text'=>'required'
      ]);

      Msg::create([
        'team_id'=>$team_id,
        'auth_id'=>Auth::user()->id,
        'message'=>$this->text
      ]);

      $this->redirect('/team/message', navigate: true);
    }
}
