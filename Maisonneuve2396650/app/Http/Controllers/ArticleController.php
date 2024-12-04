<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(){
        // $articles = Article::with('etudiant')->get()->paginate(14);
        $articles = Article::select()->paginate(14);
        return view('forum.index', ['articles' => $articles]);
    }

    public function create(){
        return view('forum.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|string|max:255',
            'content'=>'required',
            'language'=>'required|in:en,fr'
        ]);

        $etudiant = Auth::user()->etudiant;

        if (!$etudiant) {
            return redirect()->back()->withErrors(['error' => 'Aucun étudiant associé à cet utilisateur.']);
        }

        // dd(Auth::user()->etudiant);

        Article::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'language'=>$request->language,
            'etudiant_id' => $etudiant->id,
        ]);

        return redirect()->route('forum.index')->with('success', 'Article Ajouté avec succès!');
    }

    public function edit(Article $article){
        if ($article->etudiant_id !== Auth::user()->etudiant->id){
            abort(403, 'Action non autorisé');
        }
        return view('forum.edit', compact('article'));
    }

    public function update(Request $request, Article $article){
        if (Auth::user()->etudiant->id !== $article->etudiant_id){
            abort(403, 'Action non autorisé');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'language' => 'required|in:en,fr',
        ]);

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'language' => $request->language,
        ]);

        return redirect()->route('forum.index')->with('success', 'Article modifié avec succès!');
    }

    public function show(Article $article)
    {
        return view('forum.show', ['article' => $article]);
    }

    public function destroy(Article $article){
        if ($article->etudiant_id !== Auth::user()->etudiant->id){
            abort(403, 'Action non autorisé.');
        }

        $article->delete();

        return redirect()->route('forum.index')->with('success', 'Article supprimé avec succès!');
    }
}
