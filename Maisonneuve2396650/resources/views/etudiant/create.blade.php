@extends('layouts.layout')

@section('title', "Ajout d'un Étudiant")

@section('content')
    <h2>Ajout d'un Étudiant</h2>
    <form action="{{ route('etudiant.store')}}" method="POST">
        @csrf
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>
        </div>
        <div>
            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" placeholder="555-555-5555" required>
        </div>
        <div>
            <label for="date_de_naissance">Date de Naissance :</label>
            <input type="date" id="date_de_naissance" name="date_de_naissance" required>
        </div>
        <div>
            <label for="ville_id">Ville :</label>
            <select id="ville_id" name="ville_id" required>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>
                        {{ $ville->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
@endsection
