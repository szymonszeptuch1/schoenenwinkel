@extends('layouts.app')

@section('content')
    <div class="shoe-detail-container">
        <div class="shoe-detail-image">
            <img src="{{ asset('images/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="shoe-image">
        </div>
        <div class="shoe-detail-info">
            <h1 class="shoe-name">{{ $shoe->name }}</h1>
            <p><strong class="shoe-detail-label">Merk:</strong> <span class="shoe-detail-value">{{ $shoe->brand }}</span></p>
            <p><strong class="shoe-detail-label">Prijs:</strong> <span class="shoe-detail-value">€{{ number_format($shoe->price, 2) }}</span></p>
            <p><strong class="shoe-detail-label">Grootte:</strong> <span class="shoe-detail-value">{{ $shoe->size }}</span></p>
            <p><strong class="shoe-detail-label">Categorie:</strong> <span class="shoe-detail-value">{{ $shoe->category->name }}</span></p>
            <p><strong class="shoe-detail-label">Beschrijving:</strong> <span class="shoe-detail-value">{{ $shoe->description }}</span></p>

            <a href="{{ route('shoes.index') }}" class="btn-back-to-collection">Terug naar de collectie</a>
        </div>
    </div>
@endsection