<x-guest-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('products.index') }}" class="text-sm text-indigo-600 hover:underline">
                    &larr; Terug naar het assortiment
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    
                    <div>
                        <img class="w-full h-64 md:h-full object-cover" src="{{ $product->image }}" alt="Afbeelding voor {{ $product->name }}">
                    </div>
                    
                   
                    <div class="p-8 flex flex-col justify-center">
                       
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            {{ $product->name }}
                        </h1>
                     
                        <p class="text-3xl font-light text-indigo-600 mb-4">
                            € {{ $product->price_in_euros }}
                        </p>
                        
                      
                        <div class="text-gray-700 leading-relaxed mb-6">
                            <h3 class="font-semibold text-gray-800 mb-1">Omschrijving</h3>
                            <p class="whitespace-pre-line">{{ $product->description ?? 'Geen omschrijving beschikbaar.' }}</p>
                        </div>
                        
        
                        <form action="{{ route('cart.store', $product) }}" method="POST" class="mt-auto">
                            @csrf
                            
                            <div class="flex items-center space-x-4 mb-4">
                                <label for="quantity" class="font-medium text-gray-700">Aantal:</label>
                                <x-text-input id="quantity" name="quantity" type="number" value="1" min="1" max="20" class="w-20 text-center" />
                            </div>
                            
                            <button typeG="submit" class="w-full px-6 py-3 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-indigo-600 hover:bg-indigo-700">
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