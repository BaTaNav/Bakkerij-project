<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

}
