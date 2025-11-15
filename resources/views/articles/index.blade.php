<x-guest-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">
                    Ons Laatste Nieuws
                </h1>
                <p class="text-center text-gray-600 dark:text-gray-400 mt-2">
                    Blijf op de hoogte van onze nieuwste broden, taarten en aanbiedingen.
                </p>
            </div>

            <!-- Grid voor alle nieuwsartikelen -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse ($articles as $article)
                    <!-- Artikel Kaart -->
                    <a href="{{ route('articles.show', $article) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                        <!-- Afbeelding -->
                        <img class="w-full h-48 object-cover" src="{{ $article->image }}" alt="Afbeelding voor {{ $article->title }}">
                        
                        <div class="p-6">
                            <!-- Titel -->
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2 truncate">
                                {{ $article->title }}
                            </h2>
                            
                            <!-- Publicatiedatum -->
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                Gepubliceerd op: {{ $article->published_at->format('d M, Y') }}
                            </p>
                            
                            <!-- Inhoud (kort) -->
                            <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                            </p> <!-- <--- DIT WAS </f>, NU GECORRIGEERD -->
                            
                            <!-- Lees meer link -->
                            <div class="mt-4">
                                <span class="text-indigo-600 dark:text-indigo-400 font-medium">
                                    Lees meer &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <!-- Geen artikelen gevonden -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-700 dark:text-gray-300 text-lg">
                            Er is momenteel geen nieuws te melden. Kom snel terug!
                        </p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-guest-layout>