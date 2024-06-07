<?php

use App\Livewire\Team\AddMember;
use Livewire\Volt\Component;

new class extends Component
{
    public AddMember $team;
}

?>


<div >
    <center>
        @foreach($game as $games)
        @if($games->auth_id == Auth::user()->id)
        <h2 id="ajouter_un_membre">
            Ajouter un membre
        </h2>
        <br>
        @if(session('msg') == '200')
        <h2>Nous avons envoyer un email a l'adresse email demander . il n'est pas dans le site</h2>
        @endif
        @if(session('msg') == '401')
        <h2>Vous avez deja ajouter cette personne au groupe</h2>
        @endif
        @if(session('msg') == '201')
        <h2>Nous avons envoyer une demande a l'utilisateur demander , merci.</h2>
        @endif
        <form wire:submit="addMember">
            <input type="email" wire:model="email" placeholder="email de l'utilisateur" name="email" id="input_jouter_un_membre">
            <br>
            <br>
            <button id="button-ajouter">
                Ajouter
            <button>
        </form>
        @endif
        @endforeach
    </center>

</div>