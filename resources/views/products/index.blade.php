<x-guest-layout>


    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900">
                    Ons Assortiment
                </h1>
                <p class="text-gray-600 mt-2">
                    Bekijk al onze heerlijke, ambachtelijke producten.
                </p>
            </div>

          
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @forelse ($products as $product)
               
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
                        <a href="{{ route('products.show', $product) }}">
                            <img class="w-full h-48 object-cover" src="{{ $product->image }}" alt="Afbeelding voor {{ $product->name }}">
                        </a>
                        
                        <div class="p-4 flex flex-col flex-grow">
                           
                            <h2 class="text-lg font-semibold text-gray-900 truncate">
                                {{ $product->name }}
                            </h2>
                            
                           
                            <p class="text-lg font-bold text-indigo-600 my-2">
                                € {{ $product->price_in_euros }}
                            </p>
                            
                          
                            <p class="text-gray-600 text-sm mb-4 flex-grow">
                                {{ \Illuminate\Support\Str::limit($product->description, 70) }}
                            </p>
                            
                           
                            <div class="mt-auto">
                                <a href="{{ route('products.show', $product) }}" class="block w-full text-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    Bekijk Details
                                </a>
                                
                                <!-- TODO: Hier komt later de "Voeg toe aan winkelwagen" knop -->
                                <!-- <button class="mt-2 w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                    Bestel nu
                                </button> -->
                            </div>
                        </div>
                    </div>
                @empty
                   
                    <div class="col-span-1 md:col-span-2 lg:col-span-4 text-center py-12">
                        <p class="text-gray-700 text-lg">
                            Er zijn momenteel geen producten beschikbaar in de winkel.
                        </p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-guest-layout>