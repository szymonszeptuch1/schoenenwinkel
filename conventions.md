

1. Bestandenstructuur
Controllers: In app/Http/Controllers. Naam: ShoeController.php, CategoryController.php.
Modellen: In app/Models. Naam: Shoe.php, Category.php.
Migrations: In database/migrations. Duidelijke namen zoals create_shoes_table.php.
Views: In resources/views. Organiseer per entiteit: shoes/index.blade.php.




2. Naamgevingsconventies
Variabelen: Gebruik camelCase. Voorbeeld: $shoeName, $shoePrice.
Klassen: Gebruik PascalCase. Voorbeeld: Shoe, Category.
Database: Gebruik snake_case. Voorbeeld: category_id, shoe_price.




3. Database en Relaties
Primary Key: Gebruik altijd id.
Foreign Keys: Gebruik category_id, shoe_id.
Eloquent Relaties: Gebruik belongsTo en hasMany.



4. Code Style
Indentatie: 4 spaties, geen tabs.
Regellengte: Maximaal 120 tekens.
Commentaar: Gebruik PHPDoc voor functies en methoden.



5. Validatie
Gebruik Laravel’s ingebouwde validatie:

$request->validate([
    'name' => 'required|max:255',
    'price' => 'required|numeric',
]);






6. Routes
Gebruik resource voor CRUD-acties:

Route::resource('shoes', ShoeController::class);




7. Authenticatie
Gebruik auth middleware voor beveiligde routes:

Route::middleware('auth')->resource('shoes', ShoeController::class);



8. Error Handling
Toon foutmeldingen in de view:

@if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif




9. Front-end
CSS: Gebruik een externe stylesheet en consistente klassen.
JavaScript: Gebruik moderne JavaScript (ES6+) en zorg voor gescheiden bestanden.
