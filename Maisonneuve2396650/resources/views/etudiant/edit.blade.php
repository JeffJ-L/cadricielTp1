@extends('layouts.layout')

@section('title', "Mise à Jour d'un Étudiant")

@section('content')
    <h2>Mise à Jour d'un Étudiant</h2>
    <form action="{{ route('etudiant.update', ['etudiant' => $etudiant->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $etudiant->nom) }}" required>
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{ old('email', $etudiant->email) }}" required>
        </div>
        <div>
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $etudiant->adresse) }}" required>
        </div>
        <div>
            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="{{ old('telephone', $etudiant->telephone) }}" required>
        </div>
        <div>
            <label for="date_de_naissance">Date de Naissance :</label>
            <input type="date" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance', $etudiant->date_de_naissance) }}" required>
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
            <button type="submit">Mettre à jour</button>
        </div>
    </form>
@endsection
