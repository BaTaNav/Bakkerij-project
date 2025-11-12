<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage; // <-- BELANGRIJK: VOEG DEZE TOE
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $request->user()->fill($request->validated());

  
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


        if ($request->hasFile('profielfoto')) {
            

            if ($request->user()->profielfoto) {
                Storage::disk('public')->delete($request->user()->profielfoto);
            }


            $path = $request->file('profielfoto')->store('profile-photos', 'public');

            $request->user()->profielfoto = $path;
        }


        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();

        $user = $request->user();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return Redirect::to('/');
    }
}