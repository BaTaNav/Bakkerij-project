<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Bewerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Naam -->
                        <div>
                            <x-input-label for="name" :value="__('Naam')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Omschrijving -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Omschrijving')" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Prijs (converteer centen terug naar euro's voor weergave) -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Prijs (in Euro, bv. 2.50)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" min="0" name="price" :value="old('price', $product->price / 100)" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Afbeelding -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Nieuwe Product Afbeelding (optioneel)')" />
                            <input id="image" name="image" type="file" class="mt-1 block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            
                            <!-- Huidige afbeelding -->
                            <div class="mt-4">
                                <p>Huidige afbeelding:</p>
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-48 h-auto object-cover rounded mt-2">
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Product Bijwerken') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>