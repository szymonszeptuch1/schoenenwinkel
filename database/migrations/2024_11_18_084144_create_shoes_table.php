<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('shoes', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Naam van de schoen
        $table->string('brand'); // Merk van de schoen
        $table->decimal('price', 8, 2); // Prijs van de schoen
        $table->integer('size'); // Schoenmaat
        $table->text('description')->nullable(); // Omschrijving van de schoen
        $table->integer('stock')->default(0); // Aantal op voorraad
        $table->string('image')->nullable(); // Afbeelding URL of pad
        $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Verwijzing naar categorie (optioneel)
        $table->timestamps(); // Aanmaak- en update-tijden
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
