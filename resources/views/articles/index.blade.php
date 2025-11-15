<x-guest-layout>
    <div class="py-12 bg-background-warm min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-center text-primary-800">
                    Ons Laatste Nieuws
                </h1>
                <p class="text-center text-text-secondary mt-2">
                    Blijf op de hoogte van onze nieuwste broden, taarten en aanbiedingen.
                </p>
            </div>

            <!-- Grid voor alle nieuwsartikelen -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse ($articles as $article)
                    <!-- Artikel Kaart -->
                    <a href="{{ route('articles.show', $article) }}" class="block bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                        <!-- Afbeelding -->
                        <img class="w-full h-48 object-cover" src="{{ $article->image }}" alt="Afbeelding voor {{ $article->title }}">
                        
                        <div class="p-6">
                            <!-- Titel -->
                            <h2 class="text-xl font-semibold text-text-main mb-2 truncate">
                                {{ $article->title }}
                            </h2>
                            
                            <!-- Publicatiedatum -->
                            <p class="text-sm text-text-light mb-4">
                                Gepubliceerd op: {{ $article->published_at->format('d M, Y') }}
                            </p>
                            
                            <!-- Inhoud (kort) -->
                            <p class="text-text-secondary text-sm leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                            </p> <!-- <--- DIT WAS </f>, NU GECORRIGEERD -->
                            
                            <!-- Lees meer link -->
                            <div class="mt-4">
                                <span class="text-accent-600 font-medium">
                                    Lees meer &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <!-- Geen artikelen gevonden -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-text-secondary text-lg">
                            Er is momenteel geen nieuws te melden. Kom snel terug!
                        </p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-guest-layout>