<?php

namespace App\Http\Controllers;
use App\Models\Shoe;
use App\Models\Category;

use Illuminate\Http\Request;

class ShoeController extends Controller
{
    public function index()
    {
        // Haal alle schoenen op uit de database
        $shoes = Shoe::all();
        
        // Stuur de schoenen naar de view
        return view('shoes.index', compact('shoes'));
    }

    public function create()
    {
        $categories = Category::all(); // Haal alle categorieën op
        return view('shoes.create', compact('categories'));
    }

    // Opslaan van een nieuwe schoen
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        Shoe::create($request->all());

        return redirect()->route('shoes.index')->with('success', 'Schoen toegevoegd!');
    }

    // Formulier voor het bewerken van een schoen
    public function edit($id)
    {
        $shoe = Shoe::findOrFail($id);
        $categories = Category::all(); // Haal alle categorieën op
        return view('shoes.edit', compact('shoe', 'categories'));
    }

    // Bijwerken van een schoen
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $shoe = Shoe::findOrFail($id);
        $shoe->update($request->all());

        return redirect()->route('shoes.index')->with('success', 'Schoen bijgewerkt!');
    }

    // Verwijderen van een schoen
    public function destroy($id)
    {
        $shoe = Shoe::findOrFail($id);
        $shoe->delete();

        return redirect()->route('shoes.index')->with('success', 'Schoen verwijderd!');
    }
}
