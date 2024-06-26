<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight"id="titre">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="shadow navbar-text">
                <center>
                    <b class="btn btn-outline-primary col-3 " id="profil_click">Profile</b>
                    <b class="btn btn-outline-dark col-3" id="password_modify">Modifier le mot de passe</b>

                    <b class="btn btn-outline-danger col-3" id="delete_compte">Supprimer le compte</b>
                </center>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" id="profiles" hidden>
                <div class="max-w-xl">

                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" id="pswrd" hidden>
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                    <progress id="pg"></progress>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" id="deletes" hidden>
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>


        </div>
    </div>
    <script>
        $("#profil_click").on('click', function() {
            $("#profiles").fadeIn(1000).removeAttr('hidden');
            $("#pswrd").fadeOut(1000);
            $("#deletes").fadeOut(1000);
        });
        $("#password_modify").on('click', function() {
            $("#profiles").fadeOut(1000);
            $("#pswrd").fadeIn(1000).removeAttr('hidden');
            $("#deletes").fadeOut(1000);
        });
        $("#delete_compte").on('click', function() {
            $("#profiles").fadeOut(1000);
            $("#pswrd").fadeOut(1000);
            $("#deletes").fadeIn(1000).removeAttr('hidden');
        });
    </script>
</x-app-layout>