<x-guest-layout>
    <div class="py-12 bg-background-warm min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Knop om terug te gaan -->
            <div class="mb-4">
                <a href="{{ route('articles.index') }}" class="text-sm font-medium text-secondary-600 hover:text-secondary-700 transition-colors">
                    &larr; Terug naar alle nieuwsberichten
                </a>
            </div>

            <!-- Het artikel zelf -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Grote afbeelding bovenaan -->
                <img class="w-full h-64 md:h-96 object-cover" src="{{ $article->image }}" alt="Afbeelding voor {{ $article->title }}">
                
                <div class="p-8 md:p-12">
                    <!-- Titel -->
                    <h1 class="text-3xl md:text-4xl font-bold text-primary-800 mb-4">
                        {{ $article->title }}
                    </h1>
                    
                    <!-- Publicatiedatum -->
                    <p class="text-sm text-text-light mb-6 pb-6 border-b border-primary-200">
                        Gepubliceerd op: {{ $article->published_at->format('d F, Y \o\m H:i') }}
                    </p>
                    
                    <!-- Volledige inhoud -->
                    <!-- De 'whitespace-pre-line' class zorgt ervoor dat de 'enters' (nieuwe lijnen) 
                         die je in de textarea hebt ingevoerd, correct worden weergegeven -->
                    <div class="text-text-secondary text-lg leading-relaxed whitespace-pre-line">
                        {{ $article->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>