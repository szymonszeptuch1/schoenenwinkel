<?php

namespace App\Http\Controllers;
use App\Models\Shoe;

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
}
