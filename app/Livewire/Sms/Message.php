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
  public $team;
  public $_team;
  public $mess;
  public $user;
  public $team_accepte;
  public $e;
  public $n;
  public $f;
  public $id_team;

  public function mount()
  {
    $this->team = Game::get();
    $this->_team = Gamestatut::get();
    $this->mess = Msg::get();
    $this->user = User::get();
    $this->n = 0;
    $this->e = 0;
    foreach ($this->team as $key) {
      if ($key->auth_id == Auth::user()->id && $key->status == "true") {
        $this->n++;
      }
    }
    foreach ($this->_team as $keys) {
      if ($keys->user_id == Auth::user()->id && $keys->activate == "true") {
        $this->e++;
      }
    }
  }

  public function render()
  {


    return view('livewire.sms.message');
  }

  public function texto(): void
  {
    $this->team = Game::get()->where('status', 'true');
    $this->team_accepte = Gamestatut::get()->where('activate', 'true');

    foreach ($this->team as $key) {
      if ($key->auth_id == Auth::user()->id) {
        $this->id_team = $key->id;
      }
    }

    foreach ($this->team_accepte as $keys) {
      if ($keys->user_id == Auth::user()->id) {
        $this->id_team = $keys->team_id;
      }
    }

    $this->validate([
      'text' => 'required',
    ]);

    Msg::create([
      'message' => $this->text,
      'team_id' => $this->id_team,
      'auth_id' => Auth::user()->id
    ]);

    $this->redirect('/team/message', navigate: true);
  }
}
