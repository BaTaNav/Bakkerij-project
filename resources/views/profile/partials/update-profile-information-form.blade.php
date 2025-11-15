<section>
    <header>
        <h2 class="text-lg font-medium text-primary-800">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-text-secondary">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-text-main">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="text-sm font-medium text-secondary-600 hover:text-secondary-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-500 transition-colors">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-700 bg-green-50 p-2 rounded">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>


        <div class="mt-4">
            <x-input-label for="verjaardag" :value="__('Verjaardag')" />
            <x-text-input id="verjaardag" name="verjaardag" type="date" class="mt-1 block w-full" :value="old('verjaardag', $user->verjaardag)" />
            <x-input-error class="mt-2" :messages="$errors->get('verjaardag')" />
        </div>


        <div class="mt-4">
            <x-input-label for="over_mij" :value="__('Over mij')" />
            <textarea id="over_mij" name="over_mij" class="mt-1 block w-full border-primary-300 bg-white text-text-main focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('over_mij', $user->over_mij) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('over_mij')" />
        </div>


        <div class="mt-4">
            <x-input-label for="profielfoto" :value="__('Profielfoto')" />
            

            @if ($user->profielfoto)
                <div class="my-2">
                    <img src="{{ asset('storage/' . $user->profielfoto) }}" alt="Profielfoto" class="w-20 h-20 rounded-full object-cover">
                </div>
            @endif

            <input id="profielfoto" name="profielfoto" type="file" class="mt-1 block w-full text-text-main border border-primary-300 rounded-lg cursor-pointer bg-white focus:outline-none">
            <x-input-error class="mt-2" :messages="$errors->get('profielfoto')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-accent-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>