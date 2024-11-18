<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Category;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    // Toon de lijst van schoenen
    public function index(Request $request)
    {
        // Haal de zoekterm en categorie op uit de request
        $search = $request->input('search');
        $category_id = $request->input('category');

        // Haal de categorieën op voor de filter
        $categories = Category::all();

        // Haal de schoenen op en filter ze indien er een zoekterm of categorie is
        $shoes = Shoe::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('brand', 'like', "%{$search}%");
        })
        ->when($category_id, function ($query, $category_id) {
            return $query->where('category_id', $category_id);
        })
        ->get();

        // Stuur de schoenen, zoekterm en categorieën naar de view
        return view('shoes.index', compact('shoes', 'search', 'categories'));
    }

    // Formulier voor het aanmaken van een nieuwe schoen
    public function create()
    {
        $categories = Category::all(); // Haal alle categorieën op
        return view('shoes.create', compact('categories'));
    }

    // Opslaan van een nieuwe schoen
    public function store(Request $request)
    {
        // Valideer de inkomende data
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Maak een nieuwe schoen aan met de gegeven gegevens
        Shoe::create($request->all());

        // Redirect naar de indexpagina met een succesbericht
        return redirect()->route('shoes.index')->with('success', 'Schoen toegevoegd!');
    }

    // Formulier voor het bewerken van een schoen
    public function edit($id)
    {
        $shoe = Shoe::findOrFail($id); // Haal de schoen op
        $categories = Category::all(); // Haal alle categorieën op
        return view('shoes.edit', compact('shoe', 'categories'));
    }

    // Bijwerken van een schoen
    public function update(Request $request, $id)
    {
        // Valideer de inkomende data
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $shoe = Shoe::findOrFail($id); // Haal de schoen op
        $shoe->update($request->all()); // Werk de schoen bij

        // Redirect naar de indexpagina met een succesbericht
        return redirect()->route('shoes.index')->with('success', 'Schoen bijgewerkt!');
    }

    // Verwijderen van een schoen
    public function destroy($id)
    {
        $shoe = Shoe::findOrFail($id); // Haal de schoen op
        $shoe->delete(); // Verwijder de schoen

        // Redirect naar de indexpagina met een succesbericht
        return redirect()->route('shoes.index')->with('success', 'Schoen verwijderd!');
    }

    // Toon de details van een specifieke schoen
    public function show($id)
    {
        $shoe = Shoe::findOrFail($id); // Haal de schoen op
        return view('shoes.show', compact('shoe')); // Toon de details van de schoen
    }
}
