@extends('layouts.layout')
@section('title', 'Edit')
@section('content')

<h1>Edit Article</h1>
<form action="{{ route('forum.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $article->title }}" required>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
    </div>
    <div>
        <label for="language">Language</label>
        <select id="language" name="language">
            <option value="en" {{ $article->language == 'en' ? 'selected' : '' }}>English</option>
            <option value="fr" {{ $article->language == 'fr' ? 'selected' : '' }}>French</option>
        </select>
    </div>
    <button class="btn btn-secondary" type="submit">Save Changes</button>
</form>
@endsection