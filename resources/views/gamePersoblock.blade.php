<x-app-layout>
    <x-slot name="header">
<<<<<<< HEAD:resources/views/gamePersoblock.blade.php
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jeu bloquer') }}
=======
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"id="titre">
            {{ __('Ajouter un jeu') }}
>>>>>>> d5f0490290eeb4ac4b6971e420dac0c0adda5f22:resources/views/add_jeuPerso.blade.php
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center>
                        <livewire:match.gamePblock />
                    </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>