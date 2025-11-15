<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-primary-800 leading-tight">
                {{ __('Nieuws Beheer') }}
            </h2>
            <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 bg-accent-600 text-white rounded-md hover:bg-accent-700 font-medium transition-colors">
                Nieuw Artikel
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-main">

                    <!-- Succes boodschap -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel met artikelen -->
                    <table class="min-w-full divide-y divide-primary-200">
                        <thead class="bg-primary-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider">
                                    Afbeelding
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider">
                                    Titel
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-primary-700 uppercase tracking-wider">
                                    Gepubliceerd op
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Acties</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-primary-100">
                            @forelse ($articles as $article)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-16 h-10 object-cover rounded">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-text-main">
                                            {{ $article->title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-text-secondary">
                                            {{ $article->published_at->format('d-m-Y H:i') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-secondary-600 hover:text-secondary-700 font-medium">Bewerken</a>
                                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Weet je zeker dat je dit artikel wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-text-light text-center">
                                        Er zijn nog geen nieuwsartikelen gevonden.
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