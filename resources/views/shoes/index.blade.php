@extends('layouts.app')

@section('content')
    <div class="shoe-list">
        <h1>Onze Schoenen</h1>
        <div class="shoe-container">
            @foreach ($shoes as $shoe)
                <div class="shoe-card">
                    <h2>{{ $shoe->name }}</h2>
                    <p>{{ $shoe->description }}</p>
                    <p><strong>Prijs:</strong> €{{ $shoe->price }}</p>
                    <a href="{{ route('shoes.show', $shoe->id) }}" class="view-details-btn">Bekijk Details</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
