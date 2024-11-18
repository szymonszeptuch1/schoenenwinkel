<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Toon contactpagina
    public function index()
    {
        return view('contact');
    }

    // Verwerk het contactformulier
    public function store(Request $request)
    {
        // Valideer de binnengekomen gegevens
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Verwerk de gegevens, bijvoorbeeld een e-mail sturen of opslaan in de database
        // Hier kun je bijvoorbeeld de logica toevoegen voor het versturen van een e-mail:

        // Mail::to('jouw-email@example.com')->send(new ContactFormMail($validated));

        // Na succesvolle verzending
        return redirect()->route('contact')->with('success', 'Je bericht is succesvol verzonden!');
    }
}
