<x-guest-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    Contacteer Ons
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Heb je een vraag of een speciale bestelling? Laat het ons weten!
                </p>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden p-8">

                <!-- Succesbericht na versturen -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <!-- Naam -->
                    <div>
                        <x-input-label for="name" :value="__('Naam')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- E-mailadres -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('E-mailadres')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Bericht -->
                    <div class="mt-4">
                        <x-input-label for="message" :value="__('Je bericht')" />
                        <textarea id="message" name="message" rows="6" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button>
                            {{ __('Verstuur Bericht') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>