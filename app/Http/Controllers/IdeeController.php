<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use Illuminate\Http\Request;

class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idees=Idee::all();
        return view('/idees/index', compact('idees'));
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
    public function show(Idee $idee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idee $idee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idee $idee)
    {
        //
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
