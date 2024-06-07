<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"id="titre">
            {{ __('Modifier mon avatar et pseudo') }}
        </h2>
    </x-slot>
    @livewire('team.dash')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"id="color">
                <div class="p-6 text-gray-900">
                    <livewire:team.name-update />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>