<?php

namespace App\Livewire\Team;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Team extends Component
{
    use  WithFileUploads;
    public string $nom = '';
    public $file;
    public $input;
    public function render()
    {
        return view('livewire.team.team');
    }
    public function addGame(): void
    {
        $this->validate([
            'nom' => ['required', 'max:255', 'string'],

        ]);


        if (empty($this->file)) {
            $path = $this->file = $this->nom[0];
        } else {
            $this->validate([
                'file' => 'image|max:2048|min:0',
            ]);
            $this->file->store('public');
            $path = $this->file->store();
        }
        DB::update('UPDATE `games` SET `status` = "false" WHERE `auth_id` = "' . Auth::user()->id . '"');
        Game::create([
            'nom' => $this->nom,
            'icon' => $path,
            'description' => date('d/m/Y à h:i'),
            'membre' => '0',
            'status' => 'true',
            'auth_id' => Auth::user()->id
        ]);
        $this->redirect('/team/create', navigate: true);
    }
}
