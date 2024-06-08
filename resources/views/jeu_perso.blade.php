<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"id="titre">
            {{ __('Parametre') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <a href="{{route('addjeuPerso')}}" wire:navigate>
                            Ajouter un jeu
                        </a>
                        <br>
                        <a href="{{route('voirjeuPerso')}}" wire:navigate>
                            Voir mon jeu
                        </a>
                        <br>
                        <a href="{{route('bloqueJeuPerso')}}" wire:navigate>
                            Jeu bloquer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>