<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- FName -->
        <div>
            <x-input-label for="Fname" :value="__('First Name')" />
            <x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" :value="old('Fname')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('Fname')" class="mt-2" />
        </div>
        <!-- LName -->
        <div class="mt-4">
            <x-input-label for="Lname" :value="__('Last Name')" />
            <x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname" :value="old('Lname')" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('Lname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- phoneNb -->
        <div class="mt-4">
            <x-input-label for="phoneNb" :value="__('Phone Number')" />
            <x-text-input id="phoneNb"  class="block mt-1 w-full" type="text"  name="phoneNb" :value="old('phoneNb')" required autocomplete="off" />
            <x-input-error :messages="$errors->get('phoneNb')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="Address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" placeholder="Ex: District - City - Street - Building" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
