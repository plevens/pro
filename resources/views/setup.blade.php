<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"id="titre">
                {{ __('Parametre du team') }}
            </h2>
        </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="shadow navbar-text">
            <center>
            <b class="btn btn-outline-primary col-3 " id="Modifier_click">Modifier le nom et le photo du groupe</b>
            <b class="btn btn-outline-secondary col-3 " id="Ajouter_click">Ajouter un membre</b>
            <b class="btn btn-outline-danger col-3 " id="Suppression_click">Suppression du groupe</b>

            </center>
        </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"id="color">
                <div class="p-6 text-gray-900"id="mng" hidden>
                    <livewire:team.name-update />
                </div>
                <div class="p-6 text-gray-900"id="ajt" hidden>
                    <livewire:team.add-member />
                </div>
                <div class="p-6 text-gray-900"id="spm" hidden>
                    <livewire:team.delete-game />
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#Modifier_click").on('click', function() {
            $("#mng").fadeIn(1000).removeAttr('hidden');
            $("#ajt").fadeOut(1000);
            $("#spm").fadeOut(1000);
        });
        $("#Ajouter_click").on('click', function() {
            $("#mng").fadeOut(1000);
            $("#ajt").fadeIn(1000).removeAttr('hidden');
            $("#spm").fadeOut(1000);
        });
        $("#Suppression_click").on('click', function() {
            $("#ajt").fadeOut(1000);
            $("#ajt").fadeOut(1000);
            $("#spm").fadeIn(1000).removeAttr('hidden');
        });
    </script>
</x-app-layout>