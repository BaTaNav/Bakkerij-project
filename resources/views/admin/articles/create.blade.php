<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-800 leading-tight">
            {{ __('Nieuw Nieuwsartikel Aanmaken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-main">
                    
                    <!-- Validatie errors tonen als die er zijn -->
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded border border-red-200">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Het formulier -->
                    <!-- Belangrijk: enctype="multipart/form-data" is nodig voor file uploads -->
                    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Titel -->
                        <div>
                            <x-input-label for="title" :value="__('Titel')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Content (Textarea) -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Inhoud')" />
                            <textarea id="content" name="content" rows="10" class="block mt-1 w-full border-primary-300 bg-white text-text-main focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('content') }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Afbeelding -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Afbeelding (Optioneel)')" />
                            <input id="image" name="image" type="file" class="mt-1 block w-full text-text-main border border-primary-300 rounded-lg cursor-pointer bg-white focus:outline-none">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Publicatiedatum -->
                        <div class="mt-4">
                            <x-input-label for="published_at" :value="__('Publicatiedatum (Leeglaten voor nu)')" />
                            <x-text-input id="published_at" class="block mt-1 w-full" type="datetime-local" name="published_at" :value="old('published_at')" />
                            <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Artikel Opslaan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>