<x-app-layout>
    <nav class="navbar navbar-expand-sm ">
        <slot name="header" >
            <h2 id="Mon_team"class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mon team') }}
            </h2>
         </slot>
    </nav>
    <div style="position:fixed;background-color:black;color:white;height:100%">
        <button>Membre(s)</button>
        <br>
        <button>Jeux</button>
        <br>
        <button>Pseudo</button>
        <br>
        <button>Messages</button>
    </div>
    <center>
        <div class="py-12" style="margin-left:1.5cm">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <livewire:team.my-team />
                    </div>
                </div>
            </div>
        </div>
    </center>
</x-app-layout>