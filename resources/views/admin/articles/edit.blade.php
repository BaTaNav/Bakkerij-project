<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-800 leading-tight">
            {{ __('Bewerk Nieuwsartikel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-main">
                    
                    <!-- Toon validatie fouten -->
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded border border-red-200">
                            <strong>Oeps!</strong> Er was een probleem met je invoer.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Belangrijk: we gebruiken PUT/PATCH voor een update -->

                        <!-- Titel -->
                        <div>
                            <x-input-label for="title" :value="__('Titel')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $article->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Content -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')" />
                            <textarea id="content" name="content" rows="10" class="block mt-1 w-full border-primary-300 bg-white text-text-main focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('content', $article->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Publicatie Datum -->
                        <div class="mt-4">
                            <x-input-label for="published_at" :value="__('Publicatie Datum (optioneel)')" />
                            <x-text-input id="published_at" class="block mt-1 w-full" type="datetime-local" name="published_at" :value="old('published_at', $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '')" />
                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                        </div>

                        <!-- Afbeelding -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Afbeelding (optioneel)')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            
                            <!-- Huidige afbeelding preview -->
                            @if ($article->image)
                                <div class="mt-4">
                                    <p>Huidige afbeelding:</p>
                                    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-48 h-auto object-cover rounded mt-2">
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.articles.index') }}" class="text-text-secondary hover:text-text-main mr-4 font-medium transition-colors">
                                Annuleren
                            </a>
                            <x-primary-button>
                                {{ __('Artikel Bijwerken') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>