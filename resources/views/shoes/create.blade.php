@extends('layouts.app')

@section('content')
    <div class="shoe-form-container">
        <h1>Nieuwe Schoen Toevoegen</h1>

        <form action="{{ route('shoes.store') }}" method="POST" class="shoe-form">
            @csrf

            <label for="name">Naam van de schoen:</label>
            <input type="text" name="name" id="name" placeholder="Voer de naam van de schoen in" required>

            <label for="brand">Merk:</label>
            <input type="text" name="brand" id="brand" placeholder="Voer het merk van de schoen in" required>

            <label for="price">Prijs (€):</label>
            <input type="number" name="price" id="price" placeholder="Voer de prijs in" step="0.01" required>

            <label for="size">Schoenmaat:</label>
            <input type="number" name="size" id="size" placeholder="Voer de schoenmaat in" required>

            <label for="category_id">Categorie:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn-submit">Opslaan</button>
        </form>
    </div>
@endsection
