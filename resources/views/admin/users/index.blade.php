<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Alle Gebruikers</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Naam
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Gebruikersnaam
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Admin
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Acties
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if ($user->profielfoto)
                                                    <img src="{{ asset('storage/' . $user->profielfoto) }}" alt="{{ $user->name }}" class="h-10 w-10 rounded-full mr-3">
                                                @else
                                                    <div class="h-10 w-10 rounded-full bg-gray-300 dark:bg-gray-600 mr-3 flex items-center justify-center">
                                                        <span class="text-gray-600 dark:text-gray-300 font-semibold">{{ substr($user->name, 0, 1) }}</span>
                                                    </div>
                                                @endif
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            @if ($user->username)
                                                <a href="{{ route('profile.show', $user) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                    {{ $user->username }}
                                                </a>
                                            @else
                                                <span class="text-gray-400 italic">geen</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($user->is_admin)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                                    Admin
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
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
                                                                class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 font-medium">
                                                            Admin verwijderen
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.users.makeAdmin', $user) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" 
                                                                onclick="return confirm('Weet je zeker dat je {{ $user->name }} admin wilt maken?')"
                                                                class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300 font-medium">
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
