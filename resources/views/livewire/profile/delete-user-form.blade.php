<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Volt\Component;

new class extends Component
{
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);
        DB::delete('DELETE FROM `games` WHERE `auth_id` = "' . Auth::user()->id . '"');
        DB::delete('DELETE FROM `gamestatuts` WHERE `auth_id` = "' . Auth::user()->id . '" OR `user_id` = "' . Auth::user()->id . '"');
        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900"id="delete_account">
            {{ __('Supprimer le compte') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600"id="texte">
            {{ __('Une fois votre compte sera supprimé, toutes ses ressources et ses données seront définitivement supprimée. Avant de supprimer votre compte, veuiller télécharger des données ou des informations que souhaitez conserver.') }}
        </p>
    </header>

    <x-danger-button x-data="" id="boutton_delete_account" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Supprimer le compte') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6"id="form_delete_account">

            <h2 class="text-lg font-medium text-gray-900" id="delete_account">
                {{ __('Etes-vous sûr de vouloir supprimer votre compte?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600"id="texte">
                {{ __('Une fois votre compte sera supprimé, toutes ses ressources et ses données seront supprimées de manière définitive. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez définir définitivement votre compte.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" id="sr-only" />

                <x-text-input wire:model="password" id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="{{ __('Mot de passe') }}" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button id="boutton_cancel" x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <x-danger-button id="boutton_delete_account" class="ms-3">
                    {{ __('Supprimer le compte') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>