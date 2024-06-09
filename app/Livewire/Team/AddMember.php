<?php

namespace App\Livewire\Team;

use App\Livewire\Mail\Mail as MailMail;
use App\Mail\Invitation;
use App\Models\Game;
use App\Models\Gamestatut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AddMember extends Component
{
    public function render()
    {
        $game = Game::get()->where('status', 'true');
        return view('livewire.team.add-member', compact('game'));
    }
    public string $email = '';
    public $team_id;
    public $n;
    public $i;
    public $id;
    public $nbr;
    public $team_name;
    public function addMember(): void
    {
        $email = User::get();
        $teams = Game::get()->where('status', 'true');
        if (empty($this->email)) {
            # code...
        } else {
            foreach ($teams as $keys) {
                if ($keys->auth_id == Auth::user()->id) {
                    $this->team_id = $keys->id;
                }
            }
            $member = Gamestatut::get();
            foreach ($member as $keys) {
                if ($this->email == $keys->email && $this->team_id == $keys->team_id) {
                    $this->nbr++;
                }
            }
            $this->n = 0;
            $this->i = 0;
            if ($this->nbr >= 1) {
                session()->flash('msg', '401');
            } else {
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
                        'avatar' => $this->email[0],
                        'pseudo' => rand(10, 9999),
                        'team_id' => $this->team_id
                    ]);
                    session()->flash('msg', '201');
                }
                if ($this->n == 0) {
                    Mail::to($this->email)->send(new Invitation($this->team_name));
                    Gamestatut::create([
                        'auth_id' => Auth::user()->id,
                        'email' => $this->email,
                        'role' => 'gameur',
                        'activate' => 'false',
                        'accepted' => 'waiting',
                        'avatar' => $this->email[0],
                        'pseudo' => rand(10, 9999),
                        'team_id' => $this->team_id
                    ]);
                    session()->flash('msg', '200');
                }
                $this->email = "";
            }
        }
    }
}
