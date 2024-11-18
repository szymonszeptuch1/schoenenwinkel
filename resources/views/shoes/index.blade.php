@extends('layouts.app')

@section('content')
    <h1>Schoenenlijst</h1>
    <a href="{{ route('shoes.create') }}" class="cta-button">Voeg een nieuwe schoen toe</a>
    <ul>
        @foreach($shoes as $shoe)
            <li>
                {{ $shoe->name }} ({{ $shoe->brand }}) - €{{ $shoe->price }}
                <a href="{{ route('shoes.edit', $shoe->id) }}">Bewerken</a>
                <form action="{{ route('shoes.destroy', $shoe->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijderen</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
