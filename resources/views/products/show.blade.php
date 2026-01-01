<x-guest-layout>
    <div class="py-12 bg-background-warm min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('products.index') }}" class="text-sm text-secondary-600 hover:text-secondary-700 font-medium transition-colors">
                    &larr; Terug naar het assortiment
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-lg border border-primary-100 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    
                    <div>
                        <img class="w-full h-64 md:h-full object-cover" src="{{ $product->image }}" alt="Afbeelding voor {{ $product->name }}">
                    </div>
                    
                   
                    <div class="p-8 flex flex-col justify-center">
                       
                        <h1 class="text-3xl font-bold text-primary-800 mb-2">
                            {{ $product->name }}
                        </h1>
                     
                        <p class="text-3xl font-light text-secondary-600 mb-4">
                            € {{ $product->price_in_euros }}
                        </p>
                        
                      
                        <div class="text-text-main leading-relaxed mb-6">
                            <h3 class="font-semibold text-primary-800 mb-1">Omschrijving</h3>
                            <p class="whitespace-pre-line text-text-secondary">{{ $product->description ?? 'Geen omschrijving beschikbaar.' }}</p>
                        </div>
                        
        
                        <form action="{{ route('cart.store', $product) }}" method="POST" class="mt-auto">
                            @csrf
                            
                            <div class="flex items-center space-x-4 mb-4">
                                <label for="quantity" class="font-medium text-text-main">Aantal:</label>
                                <x-text-input id="quantity" name="quantity" type="number" value="1" min="1" max="20" class="w-20 text-center" />
                            </div>
                            
                            <button type="submit" class="w-full px-6 py-3 border border-transparent rounded-lg shadow-sm text-lg font-medium text-white bg-accent-600 hover:bg-accent-700 transition-colors">
                                In Winkelwagen
                            </button>
                            
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>