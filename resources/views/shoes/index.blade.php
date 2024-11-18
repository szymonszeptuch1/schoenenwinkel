@extends('layouts.app')

@section('content')
    <div class="shoe-list-container">
        <h1>Schoenenlijst</h1>

        <!-- Zoekbalk -->
        <form action="{{ route('shoes.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Zoek op naam of merk" value="{{ request()->query('search') }}" />
            <button type="submit" class="btn-search">Zoeken</button>
        </form>

        <a href="{{ route('shoes.create') }}" class="cta-button">Voeg een nieuwe schoen toe</a>

        @if($shoes->isEmpty())
            <p>Er zijn momenteel geen schoenen in de lijst.</p>
        @else
            <ul class="shoe-list">
                @foreach($shoes as $shoe)
                    <li class="shoe-item">
                        <div class="shoe-details">
                            <h3>{{ $shoe->name }}</h3>
                            <p>Merk: {{ $shoe->brand }}</p>
                            <p>Prijs: €{{ number_format($shoe->price, 2) }}</p>
                        </div>

                        <div class="shoe-actions">
                            <a href="{{ route('shoes.edit', $shoe->id) }}" class="btn-edit">Bewerken</a>

                            <form action="{{ route('shoes.destroy', $shoe->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Weet je zeker dat je deze schoen wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
