<x-guest-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Knop om terug te gaan -->
            <div class="mb-4">
                <a href="{{ route('articles.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                    &larr; Terug naar alle nieuwsberichten
                </a>
            </div>

            <!-- Het artikel zelf -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <!-- Grote afbeelding bovenaan -->
                <img class="w-full h-64 md:h-96 object-cover" src="{{ $article->image }}" alt="Afbeelding voor {{ $article->title }}">
                
                <div class="p-8 md:p-12">
                    <!-- Titel -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                        {{ $article->title }}
                    </h1>
                    
                    <!-- Publicatiedatum -->
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                        Gepubliceerd op: {{ $article->published_at->format('d F, Y \o\m H:i') }}
                    </p>
                    
                    <!-- Volledige inhoud -->
                    <!-- De 'whitespace-pre-line' class zorgt ervoor dat de 'enters' (nieuwe lijnen) 
                         die je in de textarea hebt ingevoerd, correct worden weergegeven -->
                    <div class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed whitespace-pre-line">
                        {{ $article->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>