<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\AjoutCategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function affichagecategorie(){
        $categorie=Categorie::all();
        return view ('/categories/affichercategorie',compact('categorie'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/categories/ajoutcategorie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AjoutCategorieRequest $request)
    {
        $categorie= new Categorie();
        $categorie->libelle = $request->libelle;
        $categorie->save();
        return redirect('/categorieAffichage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie,$id)
    {
        $categorie= Categorie::find($id);
        return view('categories.modifiercategorie', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        
        $categorie= Categorie::find($request->id);
        $categorie->libelle = $request->libelle;
        $categorie->update();
        return redirect('/categorieAffichage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie= Categorie::find($id);
        $categorie->delete();   
        return back();
    }
}
