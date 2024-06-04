<<<<<<< HEAD
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter mon jeu') }}
        </h2>
    </x-slot>
    @livewire('team.dash')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <livewire:match.macth />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
=======
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
                          <livewire:match.macth />
                      </center>
                  </div>
              </div>
          </div>
      </div>
  </x-app-layout>
>>>>>>> 7690a59c3fa2ca236a7a8eca610adc0a0b41c042
