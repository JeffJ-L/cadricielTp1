<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Jeff Jean-Louis">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <a href="{{ route('welcome') }}">Accueil</a>

        @if (Auth::check())
            <a href="{{ route('documents.index') }}">Répertoire</a>
            <a href="{{ route('logout') }}">Deconnexion</a>
        @else
            <a href="{{ route('login') }}">Connexion</a>
        @endif

        <div class="language-select">
            <label for="language">Language</label>
            <select id="language" name="language">
                <option value="en">English</option>
                <option value="fr">French</option>
            </select>
        </div>
    </nav>
    @if (Auth::check())
        <div class="user-info">
            <span><strong>{{ Auth::user()->name }}</strong></span>
        </div>
    @endif

    @yield('content')

    <footer>
        <div class="footer-container">
            <p>Tous droits reservés &copy; 2024 || Maisonneuve2396650 </p>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</html>