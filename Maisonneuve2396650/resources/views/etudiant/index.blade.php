@extends('layouts.layout')
@section('title', 'Liste des etudiants')
@section('content')
<section>
    <h1>Liste des etudiants</h1>
    <div class="container">
        @forelse($etudiants as $etudiant)
        <!-- Affichage des etudiants -->
        <div class="etudiant-card">
            <h2>{{$etudiant->nom}}</h2>
            <p><strong>Email : </strong>{{$etudiant->email}}</p>
            <a class="btn" href="{{ route('etudiant.show', ['etudiant' => $etudiant->id]) }}">Voir</a>
        </div>
        @empty
        <div class="etudiant-error">
            <p>Aucun etudiant</p>
        </div>
        @endforelse
        <!-- Ajout des liens de pagination -->
    </div>
    <div class="pagination">
        {{ $etudiants->links() }}
    </div>
</section>
@endsection