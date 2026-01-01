<x-guest-layout>
    <div class="py-12 bg-background-warm min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-primary-800">
                    Jouw Winkelwagen
                </h1>
            </div>

            <div class="bg-white rounded-lg shadow-lg border border-primary-100 overflow-hidden">
                @if (session('success'))
                    <div class="p-4 bg-green-50 border-b border-green-200 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (count($cartItems) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-primary-200">
                            <thead class="bg-primary-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider">Aantal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider">Prijs p/s</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider">Totaal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-primary-100">
                                @foreach ($cartItems as $id => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-primary-800">{{ $item['name'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">
                                            € {{ number_format($item['price'] / 100, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary-800">
                                            € {{ number_format(($item['price'] * $item['quantity']) / 100, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition-colors">Verwijder</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="p-6 bg-primary-50 border-t border-primary-200 flex justify-between items-center">
                        <div>
                            <span class="text-lg font-medium text-primary-800">Totaal:</span>
                            <span class="text-xl font-bold text-secondary-600">€ {{ $totalPriceInEuros }}</span>
                        </div>
                        <div>
                           
                            @auth
                              
                                <form action="{{ route('cart.checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-accent-600 hover:bg-accent-700 transition-colors">
                                        Nu Afrekenen
                                    </button>
                                </form>
                            @else
                               
                                <a href="{{ route('login') }}" class="px-6 py-3 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-secondary-600 hover:bg-secondary-700 transition-colors">
                                    Eerst Inloggen om Af te Rekenen
                                </a>
                            @endauth
                        </div>
                    </div>

                @else
                    
                    <div class="p-12 text-center">
                        <p class="text-text-secondary text-lg">
                            Je winkelwagen is nog leeg.
                        </p>
                        <a href="{{ route('products.index') }}" class="mt-4 inline-block text-secondary-600 hover:text-secondary-700 font-medium transition-colors">
                            Begin met winkelen &rarr;
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>