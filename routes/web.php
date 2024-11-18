<?php

use App\Models\Shoe;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::get('/shoes', function () {
    $shoes = Shoe::all(); 
    return view('shoes.index', compact('shoes')); 
})->name('shoes.index');


Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');


Route::get('/history', function () {
    return view('history'); 
})->name('history');


Route::get('/shoes/{id}', function ($id) {
    $shoe = Shoe::findOrFail($id); 
    return view('shoes.show', compact('shoe')); 
})->name('shoes.show');