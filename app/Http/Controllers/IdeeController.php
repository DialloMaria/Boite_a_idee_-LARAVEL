<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idees=Idee::all();
        $commentaires = Commentaire::all()->where('idee_id');
        return view('/idees/index', compact('idees','commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie=Categorie::all();
        return view('/idees/ajoutIdees',compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie= new Idee();
        $categorie->libelle = $request->libelle;
        $categorie->description = $request->description;
        $categorie->nom_complet = $request->nom_complet;
        $categorie->email = $request->email;
        $categorie->categorie_id = $request->categorie_id;
        $categorie->save();
        return redirect('/ideeAffichage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idee $idee,$id)
    {
        $commentaires = Commentaire::all()->where('idee_id',$id);
        $idee= Idee::findOrFail($id);
        $categorie=Categorie::all();
        return view('idees/showidee',compact('idee','categorie','commentaires'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idee $idee,$id)
    {
        $idee= Idee::find($id);
        $categorie=Categorie::all();
        return view('/idees/modifieridee',compact('categorie','idee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idee $idee)
    {
        $idee = Idee::find($request->id);
        $idee = Idee::find($idee->id);
        $idee->libelle = $request->libelle;
        $idee->description = $request->description;
        $idee->nom_complet = $request->nom_complet;
        $idee->email = $request->email;
        $idee->categorie_id = $request->categorie_id;
        $idee->update();
        return redirect('/ideeAffichage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $idee=Idee::find($id);
        $idee->delete();
        return back();
    }
}
