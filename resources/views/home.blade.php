<x-guest-layout>
    <!-- De navigatiebalk wordt automatisch geladen door de layout -->

    <!-- "Hero" Sectie -->
    <div class="bg-white shadow-sm border-b border-primary-100">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-primary-800 sm:text-5xl">
                Welkom bij De Bakkerij
            </h1>
            <p class="mt-4 text-xl text-text-secondary">
                Vers brood, heerlijk gebak en de beste koffie, elke dag vers voor jou.
            </p>
            <div class="mt-8">
                <a href="{{ route('articles.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-md text-white bg-accent-600 hover:bg-accent-700 transition-colors">
                    Bekijk ons nieuws
                </a>
            </div>
        </div>
    </div>

    <!-- "Laatste Nieuws" Sectie -->
    <div class="py-12 bg-background-warm">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-primary-800 mb-8">
                Ons Laatste Nieuws
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse ($latestArticles as $article)
                    <!-- Artikel Kaart -->
                    <a href="{{ route('articles.show', $article) }}" class="block bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img class="w-full h-48 object-cover" src="{{ $article->image }}" alt="Afbeelding voor {{ $article->title }}">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-text-main mb-2 truncate">
                                {{ $article->title }}
                            </h2>
                            <p class="text-sm text-text-light mb-4">
                                Gepubliceerd op: {{ $article->published_at->format('d M, Y') }}
                            </p>
                            <p class="text-text-secondary text-sm leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 100) }}
                            </p>
                            <div class="mt-4">
                                <span class="text-accent-600 font-medium">
                                    Lees meer &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p classs="col-span-3 text-center text-text-secondary">
                        Er is momenteel geen nieuws.
                    </p>
                @endforelse

            </div>
        </div>
    </div>

</x-guest-layout>