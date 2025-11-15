<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-800 leading-tight">
            {{ __('Vraag Bewerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-main">

                    <form method="POST" action="{{ route('admin.faq-items.update', $faqItem) }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Categorie Selectie (Dropdown) -->
                        <div>
                            <x-input-label for="faq_category_id" :value="__('Categorie')" />
                            <select id="faq_category_id" name="faq_category_id" class="block mt-1 w-full border-primary-300 bg-white text-text-main focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required>
                                <option value="">-- Kies een categorie --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('faq_category_id', $faqItem->faq_category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('faq_category_id')" class="mt-2" />
                        </div>

                        <!-- Vraag -->
                        <div class="mt-4">
                            <x-input-label for="question" :value="__('Vraag')" />
                            <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question', $faqItem->question)" required />
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>

                        <!-- Antwoord -->
                        <div class="mt-4">
                            <x-input-label for="answer" :value="__('Antwoord')" />
                            <textarea id="answer" name="answer" rows="5" class="block mt-1 w-full border-primary-300 bg-white text-text-main focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('answer', $faqItem->answer) }}</textarea>
                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Vraag Bijwerken') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>