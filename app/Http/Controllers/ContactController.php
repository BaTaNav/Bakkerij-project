<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Toont het publieke contactformulier.
     */
    public function index(): View
    {
      
        return view('contact.index');
    }

    /**
     * Verwerkt het ingevulde formulier en verstuurt de e-mail.
     */
    public function store(Request $request)
    {

        $details = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);


        Mail::to('admin@ehb.be')
            ->send(new ContactFormMail($details)); 

        // 3. Stuur de gebruiker terug met een succesbericht
        return redirect()->route('contact.index')
                         ->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact op.');
    }
}