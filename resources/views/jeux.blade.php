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
                      <a href="{{route('seengame')}}" wire:navigate>
                          Voir mon jeu
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </x-app-layout>