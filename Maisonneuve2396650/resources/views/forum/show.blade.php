@extends('layouts.layout')
@section('title', 'Forum - Show')
@section('content')


<div class="forum-container">
    <section class="forum-show">
        <h1>{{ $article->title }}</h1>
        <p><strong>Author: </strong>{{ $article->etudiant->nom }}</p>
        <p><strong>Language: </strong>{{ $article->language }}</p>
        <div class="content">
            <p>{{ $article->content }}</p>
        </div>
        <a class="btn btn-secondary" href="{{ route('forum.index') }}">Back to Forum</a>
    </section>
</div>
@endsection