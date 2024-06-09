  <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="titre">
              {{ __('Ajouter mon jeu') }}
          </h2>
      </x-slot>
      @livewire('team.dash')
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="color">
                  <div class="p-6 text-gray-900">
                      <b class="btn btn-primary" id="import">
                          Importer un jeu
                      </b>

                      <b id="ajoute" class="btn btn-primary">
                          Ajouter un jeux
                      </b>

                      <b class="btn btn-primary" id="voir">
                          Voir mon jeu
                      </b>

                      <div hidden id="imports">
                          <livewire:match.importation />
                      </div>
                      <div hidden id="ajoutes">
                          <livewire:match.macth />
                      </div>
                      <div hidden id="voirs">
                          <livewire:match.seengame />
                      </div>
                  </div>
              </div>
          </div>
          <script>
              $("#import").click(function() {
                  $("#imports").removeAttr('hidden').show(function(params) {
                      $("#voirs").hide();
                      $("#ajoutes").hide();
                  })
              })
              $("#voir").click(function() {
                  $("#voirs").removeAttr('hidden').show(function(params) {
                      $("#imports").hide();
                      $("#ajoutes").hide();
                  })
              })
              $("#ajoute").click(function() {
                  $("#ajoutes").removeAttr('hidden').show(function(params) {
                      $("#voirs").hide();
                      $("#imports").hide();
                  })
              })
          </script>
      </div>
  </x-app-layout>