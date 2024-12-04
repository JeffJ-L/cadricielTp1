@extends('layouts.layout')
@section('title', 'Forum')
@section('content')

<section>
    <h1>Forum</h1>
    <a class="btn btn-secondary" href="{{ route('forum.create') }}">Ajouter un article</a>
    <div class="container">
        @forelse($articles as $article)
        <!-- Article Card -->
        <div class="etudiant-card">
            <h2>{{ $article->title }}</h2>
            <p><strong>Author: </strong>{{ $article->etudiant->nom }}</p>
            <p><strong>Language: </strong>{{ $article->language }}</p>
            <a class="btn btn-secondary" href="{{ route('forum.show', $article->id) }}">Voir</a>
            
            @if (Auth::user()->etudiant->id === $article->etudiant_id)
                <a class="btn btn-warning" href="{{ route('forum.edit', $article->id) }}">Edit</a>
                <form action="{{ route('forum.destroy', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            @endif
        </div>
        @empty
        <div class="etudiant-error">
            <p>Aucun article</p>
        </div>
        @endforelse
    </div>
    <div class="pagination">
        {{ $articles->links() }}
    </div>
</section>
@endsection