<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-primary-800 leading-tight">
                {{ __('FAQ Vragen Beheer') }}
            </h2>
            <a href="{{ route('admin.faq-items.create') }}" class="px-4 py-2 bg-accent-600 text-white rounded-md hover:bg-accent-700 font-medium transition-colors">
                Nieuwe Vraag
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-main">

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-primary-200">
                        <thead class="bg-primary-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase">
                                    Vraag
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase">
                                    Categorie
                                </th>
                                <th class="relative px-6 py-3">
                                    <span class="sr-only">Acties</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-primary-100">
                            @forelse ($items as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-main">
                                        {{ \Illuminate\Support\Str::limit($item->question, 50) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary">
                                        {{ $item->category->name ?? 'Geen categorie' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.faq-items.edit', $item) }}" class="text-secondary-600 hover:text-secondary-700 font-medium">Bewerken</a>
                                        <form action="{{ route('admin.faq-items.destroy', $item) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Weet je zeker dat je deze vraag wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-text-light text-center">
                                        Geen vragen gevonden.
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