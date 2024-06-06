<?php

use App\livewire\Match\JeuPerso;
use Livewire\Volt\Component;

new class extends Component
{
    public JeuPerso $jeu;
}

?>
<div>
    <form action="">
        <input type="text" name="" id="" placeholder="Nom du jeu">
        <br><br>
        <label for="icon">
            Icon de votre jeu
        </label>
        <input type="file" name="" id="icon" hidden>
        <br><br>
        <label for="banniere">
            Votre banniere
        </label>
        <input type="file" name="" id="banniere" hidden>
        <br><br>
        <textarea name="" id="" placeholder="Description du jeu" cols="20" rows="3"></textarea>
        <br><br>
        <button>
            Ajouter le jeu
        </button>
    </form>
</div>