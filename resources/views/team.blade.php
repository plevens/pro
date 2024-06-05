<x-app-layout>
    <nav class="navbar navbar-expand-sm ">
        <slot name="header">
            <h2 id="titre" class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter une team') }}
            </h2>
        </slot>
    </nav>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:team.team />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>