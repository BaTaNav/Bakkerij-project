<x-guest-layout>
    <div class="py-12 bg-background-warm min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-center text-primary-800">
                    Veelgestelde Vragen (FAQ)
                </h1>
                <p class="text-center text-text-secondary mt-2">
                    Vind hier antwoorden op de meest voorkomende vragen.
                </p>
            </div>

            
            <div class="space-y-8">
                
                
                @forelse ($categories as $category)
                    <section>
                        <h2 class="text-2xl font-semibold text-primary-700 mb-4 pb-2 border-b border-primary-200">
                            {{ $category->name }}
                        </h2>
                        
                        <div class="space-y-4">
                     
                            @forelse ($category->items as $item)
                                <details class="bg-white shadow-sm rounded-lg overflow-hidden">
                                   
                                    <summary class="cursor-pointer p-6 font-medium text-text-main flex justify-between items-center hover:bg-primary-50 transition-colors">
                                        {{ $item->question }}
                                        <svg class="w-5 h-5 text-text-light transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </summary>
                                    
                                   
                                    <div class="p-6 bg-background-cream border-t border-primary-100">
                                        <p class="text-text-secondary whitespace-pre-line">{{ $item->answer }}</p>
                                    </div>
                                </details>
                            @empty
                                <p class="text-text-light">Er zijn nog geen vragen in deze categorie.</p>
                            @endforelse
                        </div>
                    </section>
                @empty
                    
                    <div class="text-center py-12 bg-white rounded-lg shadow-sm">
                        <p class="text-text-secondary text-lg">
                            Er zijn nog geen veelgestelde vragen beschikbaar.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-guest-layout>