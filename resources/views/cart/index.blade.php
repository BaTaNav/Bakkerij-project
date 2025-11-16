<x-guest-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900">
                    Jouw Winkelwagen
                </h1>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if (session('success'))
                    <div class="p-4 bg-green-100 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (count($cartItems) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aantal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prijs p/s</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Totaal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cartItems as $id => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $item['name'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            € {{ number_format($item['price'] / 100, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            € {{ number_format(($item['price'] * $item['quantity']) / 100, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Verwijder</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="p-6 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                        <div>
                            <span class="text-lg font-medium text-gray-900">Totaal:</span>
                            <span class="text-xl font-bold text-indigo-600">€ {{ $totalPriceInEuros }}</span>
                        </div>
                        <div>
                           
                            @auth
                              
                                <form action="{{ route('cart.checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                        Nu Afrekenen
                                    </button>
                                </form>
                            @else
                               
                                <a href="{{ route('login') }}" class="px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gray-600 hover:bg-gray-700">
                                    Eerst Inloggen om Af te Rekenen
                                </a>
                            @endauth
                        </div>
                    </div>

                @else
                    
                    <div class="p-12 text-center">
                        <p class="text-gray-700 text-lg">
                            Je winkelwagen is nog leeg.
                        </p>
                        <a href="{{ route('products.index') }}" class="mt-4 inline-block text-indigo-600 hover:underline">
                            Begin met winkelen &rarr;
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>