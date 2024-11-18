<?php

use App\Models\Shoe;
use App\Models\Category;
use App\Http\Controllers\ShoeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::get('/shoes', function () {
    $shoes = Shoe::all(); 
    return view('shoes.index', compact('shoes')); 
})->name('shoes.index');

Route::get('/shoes/create', [ShoeController::class, 'create'])->name('shoes.create');


Route::post('/shoes', [ShoeController::class, 'store'])->name('shoes.store');


Route::get('/shoes/{id}/edit', [ShoeController::class, 'edit'])->name('shoes.edit');


Route::put('/shoes/{id}', [ShoeController::class, 'update'])->name('shoes.update');


Route::delete('/shoes/{id}', [ShoeController::class, 'destroy'])->name('shoes.destroy');

Route::resource('shoes', ShoeController::class);
Route::get('/shoe/{id}', [ShoeController::class, 'show'])->name('shoes.show');



Route::get('/contact', function () {
    return view('contact'); 
})->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');



Route::get('/history', function () {
    return view('history'); 
})->name('history');


Route::get('/shoes/{id}', function ($id) {
    $shoe = Shoe::findOrFail($id); 
    return view('shoes.show', compact('shoe')); 
})->name('shoes.show');