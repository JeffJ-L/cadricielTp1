@extends('layouts.layout')
@section('title', 'Documents')
@section('content')

<section>
    <h1>{{ $document->title }}</h1>
    <p><strong>Uploaded By:</strong> {{ $document->etudiant->nom }}</p>
    <p><strong>Language:</strong> {{ $document->language }}</p>
    <p><strong>Uploaded On:</strong> {{ $document->created_at->format('d-m-Y') }}</p>
    <a href="{{ Storage::url($document->file) }}" class="btn btn-success" target="_blank">Download</a>
    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Back to Directory</a>
</section>
@endsection