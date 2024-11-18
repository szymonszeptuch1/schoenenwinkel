<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;

    // Geef de naam van de tabel aan als deze niet de standaard Laravel conventie volgt
    protected $table = 'shoes';

    // Geef de velden aan die massaal toegewezen mogen worden
    protected $fillable = [
        'name', 
        'brand', 
        'price', 
        'size', 
        'description', 
        'stock', 
        'image', 
        'category_id'
    ];

    // Definieer de relatie met de categorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
