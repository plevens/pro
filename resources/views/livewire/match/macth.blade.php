<?php

use App\Livewire\Match\Macth;
use Livewire\Volt\Component;

new class extends Component
{
    public Macth $macth;
}

?>

<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Creer mon jeu') }}
            </h2>
        </x-slot>
        @livewire('team.dash')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <center>
                            <form wire:submit="startGame" enctype="multipart/form-data">
                                <input wire:model="nom" type="text" name="" id="" placeholder="Nom de votre jeu">
                                <br><br>
                                <label for="icon">Votre icon</label>
                                <br>
                                <input wire:model="file" type="file" hidden name="" id="icon">
                                <br>
                                description de votre jeu <br>
                                <textarea wire:model="description" name="" id="" cols="20" rows="3"></textarea>
                                <br>
                                <button wire:navigate>
                                    Lancer le jeu
                                </button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>