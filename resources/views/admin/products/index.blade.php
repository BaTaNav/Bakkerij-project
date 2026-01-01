<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-primary-800200 leading-tight">
                {{ __('Productbeheer') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                Nieuw Product
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-primary-800100">

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-primary-200700">
                        <thead class="bg-primary-50700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase">Afbeelding</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase">Naam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase">Prijs</th>
                                <th class="relative px-6 py-3"><span class="sr-only">Acties</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white800 divide-y divide-primary-200700">
                            @forelse ($products as $product)
                                <tr>
                                    <td class="px-6 py-4">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-16 h-10 object-cover rounded">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary-800100">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-primary-800100">
                                        € {{ $product->price_in_euros }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600400 hover:text-indigo-900">Bewerken</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600400 hover:text-red-900">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary text-center">
                                        Geen producten gevonden.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>