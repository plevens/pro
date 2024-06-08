<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public $file;
    public $avatar;

    use WithFileUploads;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {

        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);
        if (empty($this->avatar)) {
            $path = Auth::user()->avatar;
        } else {
            $this->validate([
                'avatar' => 'image|max:2048',
            ]);
            $this->avatar->store('public');
            $path = $this->avatar->store();
        }
        $user->fill([
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $path
        ]);
        DB::update('UPDATE `gamestatuts` SET `email` ="' . $this->email . '" WHERE `user_id`="' . Auth::user()->id . '"');
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: RouteServiceProvider::HOME);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section >
    <header>
        <h2 class="text-lg font-medium text-gray-900"id="profile_information">
            {{ __('Information sur le profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600" id="texte">
            {{ __("Mettez à jour les information de profil de votre compte et l'adresse e-mail.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <center>
                <label for="file">
                    @if($avatar)
                    <img src="{{$avatar->temporaryUrl() }}" style="border-radius: 50%;height:2.5cm" alt="Icone" width="100cm">
                    @else
                    @if(strlen(Auth::user()->avatar) == 1)
                    <h1 style="background-color:black;color:white;border-radius:50%;font-size:250%;width:2cm;height:2cm">
                        {{Auth::user()->avatar}}
                    </h1>
                    @else
                    <img src="{{asset('storage/'.Auth::user()->avatar)}}" width="100cm" style="border-radius: 50%;height:2.5cm" alt="">
                    @endif
                    @endif
                </label>
            </center>
            <input type="file" name="file" wire:model="avatar" id="file" hidden>

        </div>
        <div>
            <x-input-label for="name" :value="__('Nom')" id="label_name"/>
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('E-mail')" id="label_email"/>
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button wire:click.prevent="sendVerification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="saved">{{ __('Enregistrer') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>