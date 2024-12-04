@extends('layouts.layout')
@section('title', 'Documents')
@section('content')

<section>
    <h1>Upload Document</h1>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="language">Language</label>
            <select id="language" name="language">
                <option value="en">English</option>
                <option value="fr">French</option>
            </select>
        </div>
        <div>
            <label for="file">File</label>
            <input type="file" id="file" name="file" accept=".pdf,.zip,.doc,.docx" required>
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</section>
@endsection