<?php

namespace App\Livewire\Match;

use App\Models\Hobby;
use Livewire\Component;
use Livewire\WithFileUploads;

class Macth extends Component
{
    use  WithFileUploads;
    public string $nom = "";
    public string $description = "";
    public $file;
    public function render()
    {
        return view('livewire.match.macth');
    }

    public function startGame() : void
    {
        $this->validate([
            'nom'=>'required',
            'description'=>'required',
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

        Hobby::create([
            'nom'=>$this->nom,
            'icon'=>$path,
            'description'
        ]);
    }
}
