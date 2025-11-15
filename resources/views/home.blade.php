<x-guest-layout>
    <!-- De navigatiebalk wordt automatisch geladen door de layout -->

    <!-- "Hero" Sectie -->
    <div class="bg-white dark:bg-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-gray-100 sm:text-5xl">
                Welkom bij De Bakkerij
            </h1>
            <p class="mt-4 text-xl text-gray-600 dark:text-gray-300">
                Vers brood, heerlijk gebak en de beste koffie, elke dag vers voor jou.
            </p>
            <div class="mt-8">
                <a href="{{ route('articles.index') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Bekijk ons nieuws
                </a>
            </div>
        </div>
    </div>

    <!-- "Laatste Nieuws" Sectie -->
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100 mb-8">
                Ons Laatste Nieuws
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse ($latestArticles as $article)
                    <!-- Artikel Kaart -->
                    <a href="{{ route('articles.show', $article) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                        <img class="w-full h-48 object-cover" src="{{ $article->image }}" alt="Afbeelding voor {{ $article->title }}">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2 truncate">
                                {{ $article->title }}
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                Gepubliceerd op: {{ $article->published_at->format('d M, Y') }}
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 100) }}
                            </p>
                            <div class="mt-4">
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    Lees meer &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p classs="col-span-3 text-center text-gray-700 dark:text-gray-300">
                        Er is momenteel geen nieuws.
                    </p>
                @endforelse

            </div>
        </div>
    </div>

</x-guest-layout>