<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <!-- FName -->
        <div>
            <x-input-label for="Fname" :value="__('First Name')" />
            <x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" :value="old('Fname', $user->Fname)" required autofocus autocomplete="Fname" />
            <x-input-error :messages="$errors->get('Fname')" class="mt-2" />
        </div>
        
        <!-- LName -->
        <div class="mt-4">
            <x-input-label for="Lname" :value="__('Last Name')" />
            <x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname" :value="old('Lname', $user->Lname)" required autofocus autocomplete="Lname" />
            <x-input-error :messages="$errors->get('Lname')" class="mt-2" />
        </div>
        
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        
        <!-- phoneNb -->
        <div class="mt-4">
            <x-input-label for="phoneNb" :value="__('Phone Number')" />
            <x-text-input id="phoneNb"  class="block mt-1 w-full" type="text"  name="phoneNb" :value="old('phoneNb', $user->phoneNb)" placeholder="+961" required autocomplete="phoneNb" />
            <x-input-error :messages="$errors->get('phoneNb')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="Address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" placeholder="Ex: District - City - Street - Building" name="address" :value="old('address', $user->address)" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
