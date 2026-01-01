<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-800200 leading-tight">
            {{ __('Gebruikersbeheer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 px-4 py-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('info'))
                <div class="mb-4 px-4 py-3 bg-blue-100 border border-blue-400 text-blue-700 rounded">
                    {{ session('info') }}
                </div>
            @endif

            <div class="bg-white800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-primary-800100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Alle Gebruikers</h3>
                        <a href="{{ route('admin.users.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Nieuwe Gebruiker
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-primary-200700">
                            <thead class="bg-primary-50700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase tracking-wider">
                                        Naam
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase tracking-wider">
                                        Gebruikersnaam
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase tracking-wider">
                                        Admin
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-text-secondary300 uppercase tracking-wider">
                                        Acties
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white800 divide-y divide-primary-200700">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if ($user->profielfoto)
                                                    <img src="{{ asset('storage/' . $user->profielfoto) }}" alt="{{ $user->name }}" class="h-10 w-10 rounded-full mr-3">
                                                @else
                                                    <div class="h-10 w-10 rounded-full bg-gray-300600 mr-3 flex items-center justify-center">
                                                        <span class="text-text-secondary300 font-semibold">{{ substr($user->name, 0, 1) }}</span>
                                                    </div>
                                                @endif
                                                <div class="text-sm font-medium text-primary-800100">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary400">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary400">
                                            @if ($user->username)
                                                <a href="{{ route('profile.show', $user) }}" class="text-blue-600400 hover:underline">
                                                    {{ $user->username }}
                                                </a>
                                            @else
                                                <span class="text-gray-400 italic">geen</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($user->is_admin)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800800100">
                                                    Admin
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-50 text-primary-800700300">
                                                    Gebruiker
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if ($user->id !== auth()->id())
                                                @if ($user->is_admin)
                                                    <form action="{{ route('admin.users.removeAdmin', $user) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" 
                                                                onclick="return confirm('Weet je zeker dat je admin rechten wilt verwijderen van {{ $user->name }}?')"
                                                                class="text-red-600400 hover:text-red-900300 font-medium">
                                                            Admin verwijderen
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.users.makeAdmin', $user) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" 
                                                                onclick="return confirm('Weet je zeker dat je {{ $user->name }} admin wilt maken?')"
                                                                class="text-green-600400 hover:text-green-900300 font-medium">
                                                            Maak Admin
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <span class="text-gray-400 italic">Jij</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginatie --}}
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
