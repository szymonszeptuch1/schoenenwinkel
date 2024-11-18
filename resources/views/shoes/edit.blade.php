@extends('layouts.app')

@section('content')
    <h1>Schoen Bewerken</h1>

    <form action="{{ route('shoes.update', $shoe->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Naam:</label>
        <input type="text" name="name" id="name" value="{{ $shoe->name }}" required>

        <label for="brand">Merk:</label>
        <input type="text" name="brand" id="brand" value="{{ $shoe->brand }}" required>

        <label for="price">Prijs:</label>
        <input type="number" name="price" id="price" value="{{ $shoe->price }}" step="0.01" required>

        <label for="size">Schoenmaat:</label>
        <input type="number" name="size" id="size" value="{{ $shoe->size }}" required>

        <label for="category_id">Categorie:</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $shoe->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Opslaan</button>
    </form>
@endsection
