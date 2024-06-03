<?php

namespace App\Livewire\Team;

use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddMember extends Component
{
    public function render()
    {

        return view('livewire.team.add-member');
    }
    public string $email = '';
    public $team_id;
    public $n;
    public $i;
    public $id;
    public function addMember(): void
    {
        $email = User::get();
        $teams = Game::get()->where('status', 'true');
        foreach ($teams as $keys) {
            if ($keys->auth_id == Auth::user()->id) {
                $this->team_id = $keys->id;
            }
        }
        $this->n = 0;
        $this->i = 0;

        foreach ($email as $key) {
            if ($this->email == $key->email && $this->email != Auth::user()->email) {
                $this->n++;
                $this->id = $key->id;
            }
        }
        if ($this->n >= 1) {
            Gamestatut::create([
                'auth_id' => Auth::user()->id,
                'user_id' => $this->id,
                'email' => $this->email,
                'role' => 'gameur',
                'activate' => 'false',
                'accepted' => 'waiting',
                'team_id' => $this->team_id
            ]);
            session()->flash('msg', '201');
            $this->redirect('/setup', navigate: true);
        }
        if ($this->n == 0) {
            Gamestatut::create([
                'auth_id' => Auth::user()->id,
                'email' => $this->email,
                'role' => 'gameur',
                'activate' => 'false',
                'accepted' => 'waiting',
                'team_id' => $this->team_id
            ]);
            session()->flash('msg', '200');

            $this->redirect('/setup', navigate: true);
        }
    }
}
