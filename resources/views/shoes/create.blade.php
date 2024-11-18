@extends('layouts.app')

@section('content')
    <h1>Nieuwe Schoen Toevoegen</h1>

    <form action="{{ route('shoes.store') }}" method="POST">
        @csrf
        <label for="name">Naam:</label>
        <input type="text" name="name" id="name" required>

        <label for="brand">Merk:</label>
        <input type="text" name="brand" id="brand" required>

        <label for="price">Prijs:</label>
        <input type="number" name="price" id="price" step="0.01" required>

        <label for="size">Schoenmaat:</label>
        <input type="number" name="size" id="size" required>

        <label for="category_id">Categorie:</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Opslaan</button>
    </form>
@endsection
