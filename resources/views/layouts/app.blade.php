<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoenenwinkel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Je eigen CSS-bestand -->
</head>
<body>
    
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="{{ route('home') }}">Schoenenwinkel</a>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('shoes.index') }}">Schoenen</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('history') }}">Historie</a></li>
            </ul>
        </nav>
    </header>

    
    <main class="main-content">
        @yield('content')
    </main>

    
    <footer class="footer">
        <div class="footer-container">
            <p>&copy; 2024 Schoenenwinkel | Alle rechten voorbehouden.</p>
        </div>
    </footer>

    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
