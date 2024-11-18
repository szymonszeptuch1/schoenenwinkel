<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Definieer de relatie met schoenen
    public function shoes()
    {
        return $this->hasMany(Shoe::class);
    }
}
