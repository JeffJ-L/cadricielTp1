<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::select()->orderby('nom')->paginate(14);
        return view('etudiant.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', ['villes' => $villes, 'etudiant' => new Etudiant()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:etudiants,email|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);
    
        $etudiant = Etudiant::create($validatedData);
    
        return redirect()->route('etudiant.show', $etudiant->id)->with('success', 'Étudiant créé avec succès.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant'=>$etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    // EtudiantController.php
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);

        $etudiant->update($request->all());
        return redirect()->route('etudiant.show', ['etudiant' => $etudiant->id])
                        ->with('success', 'Étudiant mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')->withSuccess('Etudiant '.$etudiant->id.' Étudiant supprimé avec succès.');
    }
}
