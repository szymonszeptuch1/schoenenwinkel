@extends('layouts.app')

@section('content')
    <div class="home-hero">
        <h1>Welkom bij de Schoenenwinkel!</h1>
        <p>Ontdek ons assortiment van premium schoenen voor elke gelegenheid.</p>
        <a href="{{ route('shoes.index') }}" class="cta-button">Bekijk onze collectie</a>
    </div>
@endsection
