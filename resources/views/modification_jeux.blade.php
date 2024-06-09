<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="titre">
            {{ __('Modifier le jeux') }} <q>{{$id->nom}}</q>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" id="color">
                <div class="p-6 text-gray-900">
                    <div>
                        <center>
                            @if(session('msg'))
                            <div class="bg-warning text-danger">
                                Les champs sont obligatoir
                            </div>
                            @endif
                            <form action="{{route('updated.jeux',['id'=>$id->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nom" value="{{$id->nom}}" id="" placeholder="Nom du jeu">
                                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                                <br>
                                <textarea name="description" id="" placeholder="Description du jeu" cols="20" rows="3">{{$id->description}}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                <br><br>
                                <button>
                                    Modifier le jeu
                                </button>
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>