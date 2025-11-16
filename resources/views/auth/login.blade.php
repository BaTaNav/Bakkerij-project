<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-primary-800 mb-2">
                    Welkom terug
                </h2>
                <p class="text-text-secondary">
                    Log in op je account om verder te gaan
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-xl shadow-lg border border-primary-100 p-8">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded bg-white border-primary-300 text-accent-600 shadow-sm focus:ring-accent-500" name="remember">
                            <span class="ms-2 text-sm text-text-secondary hover:text-text-main transition-colors">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-secondary-600 hover:text-secondary-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-500 transition-colors" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <x-primary-button class="w-full justify-center py-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Register Link -->
                <div class="mt-6 pt-6 border-t border-primary-100 text-center">
                    <p class="text-sm text-text-secondary">
                        Nog geen account?
                        <a href="{{ route('register') }}" class="font-medium text-accent-600 hover:text-accent-700 transition-colors">
                            Registreer hier
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
