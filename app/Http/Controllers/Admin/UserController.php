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

    
}
