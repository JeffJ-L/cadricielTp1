@extends('layouts.layout')
@section('title', 'Accueil')
@section('content')

<div class="welcome-container mt-5 mb-5">
        <h1 class="text-center text-secondary">Bienvenue à Maisonneuve2396650</h1>
        <p class="text-center mt-3">
            {{ Auth::check() ? "Bonjour, " . Auth::user()->name . "! Explorez notre forum ou ajoutez vos articles." : "Connectez-vous pour explorer notre plateforme." }}
        </p>

        <div class="text-center mt-4">
            @if (Auth::check())
                <a href="{{ route('forum.index') }}" class="btn btn-success btn-lg mx-2">Accéder au Forum</a>
                <a href="{{ route('logout') }}" class="btn btn-danger btn-lg mx-2">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-secondary btn-lg mx-2">Connexion</a>
            @endif
        </div>
</div>
@endsection