<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-800 leading-tight">
            {{ __('Mijn Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-primary-100">
                <div class="p-6 text-text-main">
                    {{ __("Welkom terug,") }} {{ Auth::user()->name }}!
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                
                <a href="{{ route('products.index') }}" class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 hover:shadow-xl hover:border-primary-200 transition-all">
                    <h3 class="text-lg font-semibold text-primary-800">Winkel</h3>
                    <p class="mt-2 text-sm text-text-secondary">Bekijk ons assortiment en plaats een nieuwe bestelling.</p>
                </a>

                
                <a href="{{ route('profile.edit') }}" class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 hover:shadow-xl hover:border-primary-200 transition-all">
                    <h3 class="text-lg font-semibold text-primary-800">Mijn Profiel</h3>
                    <p class="mt-2 text-sm text-text-secondary">Pas je profielgegevens en wachtwoord aan.</p>
                </a>

                <!-- TODO: Mijn Bestellingen (voor later) -->
                <div class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 opacity-50 cursor-not-allowed">
                    <h3 class="text-lg font-semibold text-primary-800">Mijn Bestellingen</h3>
                    <p class="mt-2 text-sm text-text-secondary">(Bekijk je bestelgeschiedenis)</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>