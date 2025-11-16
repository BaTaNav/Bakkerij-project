<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mijn Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welkom terug,") }} {{ Auth::user()->name }}!
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                
                <a href="{{ route('products.index') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Winkel</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Bekijk ons assortiment en plaats een nieuwe bestelling.</p>
                </a>

                
                <a href="{{ route('profile.edit') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Mijn Profiel</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Pas je profielgegevens en wachtwoord aan.</p>
                </a>

                <!-- TODO: Mijn Bestellingen (voor later) -->
                <div class="block p-6 bg-white dark:bg-gray-700 rounded-lg shadow-md opacity-50 cursor-not-allowed">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Mijn Bestellingen</h3>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">(Bekijk je bestelgeschiedenis)</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>