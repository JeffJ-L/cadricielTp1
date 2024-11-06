@extends('layouts.layout')
@section('title', 'Etudiant')
@section('content')


<div class="etudiant-card">
    <h2>{{$etudiant->nom}}</h2>
    <p><strong>Email : </strong>{{$etudiant->email}}</p>
    <p><strong>Adresse : </strong>{{$etudiant->adresse}}</p>
    <p><strong>Telephone : </strong>{{$etudiant->telephone}}</p>
    <p><strong>Date de naissance : </strong>{{$etudiant->date_de_naissance}}</p>
    <p><strong>Ville : </strong>{{$etudiant->ville->nom}}</p>
    <div class="boutons-action">
        <a href="{{ route('etudiant.index') }}">Supprimer</a>
        <a href="{{ route('etudiant.edit', ['etudiant' => $etudiant->id]) }}">Modifier</a>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST">
                @csrf
                @method('DELETE')
                
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Supprimer Étudiant</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer l'étudiant : {{ $etudiant->nom }} ?
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection