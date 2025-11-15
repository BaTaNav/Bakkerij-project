<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <div class="max-w-xl">
                    
                    <header class="mb-6">
                        <h2 class="text-lg font-medium text-primary-800">
                            {{ __('Profiel van') }} {{ $user->username }}
                        </h2>
                
                        <p class="mt-1 text-sm text-text-secondary">
                            Openbare informatie voor deze gebruiker.
                        </p>
                    </header>

                    <!-- Profielfoto -->
                    @if ($user->profielfoto)
                        <img class="w-32 h-32 rounded-full object-cover mb-4" src="{{ asset('storage/' . $user->profielfoto) }}" alt="Profielfoto van {{ $user->username }}">
                    @else
                        <!-- Standaard placeholder als er geen foto is -->
                        <div class="w-32 h-32 rounded-full bg-primary-100 flex items-center justify-center mb-4">
                            <span class="text-primary-600 text-5xl">{{ substr($user->username, 0, 1) }}</span>
                        </div>
                    @endif

                    <!-- Username -->
                    <div>
                        <h3 class="text-md font-medium text-text-main">Username</h3>
                        <p class="mt-1 text-lg text-text-secondary">{{ $user->username }}</p>
                    </div>

                    <!-- Over mij -->
                    @if ($user->over_mij)
                        <div class="mt-4">
                            <h3 class="text-md font-medium text-text-main">Over mij</h3>
                            <p class="mt-1 text-sm text-text-secondary whitespace-pre-line">{{ $user->over_mij }}</p>
                        </div>
                    @endif

                    <!-- Verjaardag (Optioneel, misschien wil je dit privé houden?) -->
                    <!-- Voor nu laten we het weg van de *publieke* pagina -->

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>