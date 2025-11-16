<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-primary-800 mb-2">
                    Maak een account aan
                </h2>
                <p class="text-text-secondary">
                    Word lid van onze bakkerij gemeenschap
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-xl shadow-lg border border-primary-100 p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <x-primary-button class="w-full justify-center py-3">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="mt-6 pt-6 border-t border-primary-100 text-center">
                    <p class="text-sm text-text-secondary">
                        Al een account?
                        <a href="{{ route('login') }}" class="font-medium text-accent-600 hover:text-accent-700 transition-colors">
                            Log hier in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
