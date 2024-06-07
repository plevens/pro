  <x-app-layout>
      <x-slot name="header">
<<<<<<< HEAD
          <h2 class="font-semibold text-xl text-gray-800 leading-tight"id="titre">
              {{ __('Creer mon jeu') }}
=======
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Ajouter mon jeu') }}
>>>>>>> e73ad1f864b1e162e616a86a594770e80cfaa56b
          </h2>
      </x-slot>
      @livewire('team.dash')
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"id="color">
                  <div class="p-6 text-gray-900">
                      <center>
                          <livewire:match.macth />
                      </center>
                      <a href="{{route('seengame')}}" wire:navigate id="lien_voir_mon_jeu">
                          Voir mon jeu
                      </a>
                      <br>
                      <a href="{{route('blockjeu')}}" wire:navigate id="lien_jeu_bloquer">
                          Jeu bloquer
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </x-app-layout>