@extends('layouts.app')

@section('content')
    <div class="shoe-form-container">
        <h1>Schoen Bewerken</h1>

        <form action="{{ route('shoes.update', $shoe->id) }}" method="POST" class="shoe-form">
            @csrf
            @method('PUT')

            <label for="name">Naam van de schoen:</label>
            <input type="text" name="name" id="name" value="{{ $shoe->name }}" placeholder="Voer de naam van de schoen in" required>

            <label for="brand">Merk:</label>
            <input type="text" name="brand" id="brand" value="{{ $shoe->brand }}" placeholder="Voer het merk van de schoen in" required>

            <label for="price">Prijs (€):</label>
            <input type="number" name="price" id="price" value="{{ $shoe->price }}" step="0.01" placeholder="Voer de prijs in" required>

            <label for="size">Schoenmaat:</label>
            <input type="number" name="size" id="size" value="{{ $shoe->size }}" placeholder="Voer de schoenmaat in" required>

            <label for="category_id">Categorie:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $shoe->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn-submit">Opslaan</button>
        </form>
    </div>
@endsection
