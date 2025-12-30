<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Toon een lijst van alle gebruikers
     */
    public function index(): View
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Toon formulier om nieuwe gebruiker aan te maken
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Sla nieuwe gebruiker op
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['boolean'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $request->has('is_admin') ? true : false,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker ' . $user->name . ' succesvol aangemaakt.');
    }

    /**
     * Verhef een gebruiker tot admin
     */
    public function makeAdmin(User $user): RedirectResponse
    {
        // Voorkom dat gebruiker zichzelf admin maakt (voor extra zekerheid)
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Je bent al een admin.');
        }

        // Check of gebruiker al admin is
        if ($user->is_admin) {
            return redirect()->back()->with('info', 'Deze gebruiker is al een admin.');
        }

        // Maak gebruiker admin
        $user->update(['is_admin' => true]);

        return redirect()->back()->with('success', $user->name . ' is nu een admin.');
    }
    
    /**
     * Verwijder admin rechten van een gebruiker
     */
    public function removeAdmin(User $user): RedirectResponse
    {
        // Voorkom dat gebruiker zichzelf demote
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Je kunt je eigen admin rechten niet verwijderen.');
        }

        // Check of gebruiker admin is
        if (!$user->is_admin) {
            return redirect()->back()->with('info', 'Deze gebruiker is geen admin.');
        }

        // Verwijder admin rechten
        $user->update(['is_admin' => false]);

        return redirect()->back()->with('success', 'Admin rechten verwijderd van ' . $user->name . '.');
    }

}
