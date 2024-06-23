<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Requests\AjoutCommentaireeRequest;
use App\Http\Requests\ModifierCommentaireeRequest;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AjoutCommentaireeRequest $request)
    {
        $commentaire = new Commentaire();
        $commentaire->libelle = $request->libelle;
        $commentaire->nom_complet= $request->nom_complet;
        $commentaire->idee_id = $request->idee_id;
        $commentaire->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire,$id)
    {
        $commentaire= Commentaire::find($id);
        return view('commentaires.modifiercommentaire',compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModifierCommentaireeRequest $request, Commentaire $commentaire)
    { 
        $commentaire= Commentaire::find($request->id);
        $commentaire->libelle = $request->libelle;
        $commentaire->nom_complet= $request->nom_complet;
        $commentaire->update();
        return redirect('/ideeAffichage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentaires=Commentaire::find($id);
        $commentaires->delete();
        return back();
    }
}
