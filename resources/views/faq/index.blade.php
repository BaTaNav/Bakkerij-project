<x-guest-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">
                    Veelgestelde Vragen (FAQ)
                </h1>
                <p class="text-center text-gray-600 dark:text-gray-400 mt-2">
                    Vind hier antwoorden op de meest voorkomende vragen.
                </p>
            </div>

            
            <div class="space-y-8">
                
                
                @forelse ($categories as $category)
                    <section>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-300 dark:border-gray-700">
                            {{ $category->name }}
                        </h2>
                        
                        <div class="space-y-4">
                     
                            @forelse ($category->items as $item)
                                <details class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                                   
                                    <summary class="cursor-pointer p-6 font-medium text-gray-900 dark:text-gray-100 flex justify-between items-center">
                                        {{ $item->question }}
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </summary>
                                    
                                   
                                    <div class="p-6 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-200 dark:border-gray-700/50">
                                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $item->answer }}</p>
                                    </div>
                                </details>
                            @empty
                                <p class="text-gray-500 dark:text-gray-400">Er zijn nog geen vragen in deze categorie.</p>
                            @endforelse
                        </div>
                    </section>
                @empty
                    
                    <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                        <p class="text-gray-700 dark:text-gray-300 text-lg">
                            Er zijn nog geen veelgestelde vragen beschikbaar.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-guest-layout>