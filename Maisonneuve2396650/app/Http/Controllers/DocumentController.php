<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('etudiant')->paginate(10);
        return view('documents.index', ['documents' => $documents]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,zip,doc,docx|max:10240',
            'language' => 'required|in:en,fr',
        ]);

        $filePath = $request->file('file')->store('documents', 'public');

        Document::create([
            'title' => $request->title,
            'file_path' => $filePath,
            'language' => $request->language,
            'etudiant_id' => Auth::user()->etudiant->id,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('documents.show', ['document' => $document]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        if ($document->etudiant_id !== Auth::user()->etudiant->id) {
            abort(403, 'Action non autorisé.');
        }

        return view('documents.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        if ($document->etudiant_id !== Auth::user()->etudiant->id) {
            abort(403, 'Action non autorisé.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'language' => 'required|in:en,fr',
        ]);

        $document->update($request->only('title', 'language'));

        return redirect()->route('documents.index')->with('success', 'Document mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->etudiant_id !== Auth::user()->etudiant->id) {
            abort(403, 'Action non autorisé.');
        }

        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document supprimé avec succès!');
    }
}
