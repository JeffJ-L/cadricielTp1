@extends('layouts.layout')
@section('title', 'Forum')
@section('content')

<h1>Create Article</h1>
<form action="{{ route('forum.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="5" required></textarea>
    </div>
    <div>
        <label for="language">Language</label>
        <select id="language" name="language">
            <option value="en">English</option>
            <option value="fr">French</option>
        </select>
    </div>
    <button class="btn btn-secondary" type="submit">Publish</button>
</form>
@endsection