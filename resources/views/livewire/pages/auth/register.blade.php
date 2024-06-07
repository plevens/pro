<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $file;

    /**
     * Handle an incoming registration request.
     */
    use WithFileUploads;
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);
        if (empty($this->file)) {
            $path = $this->file = 'icons/person-circle.svg';
        } else {
            $this->validate([
                'file' => 'image|max:2048|min:0',
            ]);
            $this->file->store('public');
            $path = $this->file->store();
        }

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'avatar' => $path
        ])));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <center>
                <label for="file">
                    @if($file)
                    <center>
                        <img src="{{$file->temporaryUrl() }}" style="border-radius: 50%;height:2.5cm" alt="Icone" width="100cm">
                    </center>
                    @else
                    <center>
                        <img src="{{asset('icons/person-circle.svg')}}" alt="Icone" width="100cm">
                    </center>
                    @endif
                </label>
            </center>
            <input type="file" name="file" wire:model="file" hidden id="file">
        </div>
        <div>
            <label for="name">Name</label>
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="name">Email</label>
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="name">Password</label>

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="name">Confirm Password</label>

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a id="login" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <button id="button-register-register" class="ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>