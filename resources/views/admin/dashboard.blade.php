<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-primary-100">
                <div class="p-6 text-text-main">
                    {{ __("Welkom, Admin!") }} Je kunt hier de site beheren.
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">

               
                <a href="{{ route('admin.products.index') }}" class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 hover:shadow-xl hover:border-primary-200 transition-all">
                    <h3 class="text-lg font-semibold text-primary-800">Productbeheer</h3>
                    <p class="mt-2 text-sm text-text-secondary">Beheer alle broden, taarten en andere producten in de winkel.</p>
                </a>

                
                <a href="{{ route('admin.articles.index') }}" class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 hover:shadow-xl hover:border-primary-200 transition-all">
                    <h3 class="text-lg font-semibold text-primary-800">Nieuwsbeheer</h3>
                    <p class="mt-2 text-sm text-text-secondary">Schrijf en beheer nieuwsartikelen voor de homepage.</p>
                </a>

               
                <a href="{{ route('admin.faq-items.index') }}" class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 hover:shadow-xl hover:border-primary-200 transition-all">
                    <h3 class="text-lg font-semibold text-primary-800">FAQ Vragen Beheer</h3>
                    <p class="mt-2 text-sm text-text-secondary">Beheer de individuele vragen en antwoorden.</p>
                </a>

               
                <a href="{{ route('admin.faq-categories.index') }}" class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 hover:shadow-xl hover:border-primary-200 transition-all">
                    <h3 class="text-lg font-semibold text-primary-800">FAQ Categorieën</h3>
                    <p class="mt-2 text-sm text-text-secondary">Beheer de categorieën voor de FAQ (bv. "Bestellen").</p>
                </a>
                
                <!-- Gebruikersbeheer -->
                <a href="{{ route('admin.users.index') }}" class="block p-6 bg-white rounded-lg shadow-md border border-primary-100 hover:shadow-xl hover:border-primary-200 transition-all">
                    <h3 class="text-lg font-semibold text-primary-800">Gebruikersbeheer</h3>
                    <p class="mt-2 text-sm text-text-secondary">Beheer gebruikers en wijs admin rechten toe.</p>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>