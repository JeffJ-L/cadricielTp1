@extends('layouts.layout')
@section('title', 'Documents')
@section('content')

<section>
    <h1>Documents Directory</h1>
    <a class="btn btn-primary" href="{{ route('documents.create') }}">Upload Document</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Uploaded By</th>
                <th>Language</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{ $document->title }}</td>
                <td>{{ $document->etudiant->nom }}</td>
                <td>{{ $document->language }}</td>
                <td>
                <div class="actions">
                        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-secondary">Voir</a>
                        @if (Auth::user()->etudiant->id === $document->etudiant_id)
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $documents->links() }}
    </div>
</section>
@endsection