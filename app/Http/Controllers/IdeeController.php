<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Mail\IdeeValidee;
use App\Models\Categorie;
use App\Models\Commentaire;

use App\Mail\IdeenonValidee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AjoutIdeeRequest;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\ModifierIdeeRequest;

class IdeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function updateStatus(Request $request)
    {
        // Valider et mettre à jour le statut de l'idée...

        // Récupérer l'idée mise à jour
        $idee = Idee::findOrFail($request->id);

        // Envoyer l'e-mail à l'utilisateur
        Mail::to($idee->user->email)->send(new IdeeStatusUpdateNotification($idee));

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Statut de l\'idée mis à jour et notification envoyée.');
    }   

    public function dashboard()
    {
        
        $idees=Idee::all();
        $commentaires = Commentaire::all()->where('idee_id');
        return view('/idees/dashbord', compact('idees','commentaires'));
    }

    public function index()
    {
        
        
 
        $idees=Idee::all();
        $commentaires = Commentaire::all()->where('idee_id');
        return view('/idees/index', compact('idees','commentaires'));
    }
    public function ListeIdee()
    {
        $idees=Idee::all();
        $commentaires = Commentaire::all()->where('idee_id');
        return view('/idees/listeidee', compact('idees','commentaires'));
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
    public function store(AjoutIdeeRequest $request)
    {

        $categorie= new Idee();
        $categorie->libelle = $request->libelle;
        $categorie->description = $request->description;
        $categorie->nom_complet = $request->nom_complet;
        $categorie->email = $request->email;
        $categorie->image = $request->image;
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

    public function editStatus(Idee $idee,$id)
    {
        $idee= Idee::find($id);
        return view('/idees/modifierStatus',compact('idee'));
    }
    // public function updateStatus(Request $request,$id)
    // {
    //     $request->validate([
    //         'status' => 'required|in:approuvee,refusee', // Validation du statut
    //     ]);

    //     $idee = Idee::findOrFail($id);
    //     $idee->status = $request->status;
    //     $idee->update();
    //     return redirect('/ideeAffichage');
    // }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(ModifierIdeeRequest $request, Idee $idee)
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

    public function action(Request $request, $id, $action)
{
    $idee = Idee::find($id);

    if (!$idee) {
        return back()->with('error', 'Idée non trouvée');
    }

    switch ($action) {
        case 'approuvee':
            $idee->status = 'approuvee';
            $idee->save();
            Mail::to($idee->email)->send(new IdeeValidee($idee));
            return back()->with('success', 'Idée approuvée et email envoyé');
            break;

        case 'refusee':

            $idee->status = 'refusee';
            $idee->save();
            Mail::to($idee->email)->send(new IdeenonValidee($idee));
            return back()->with('success', 'Idée non approuvée et email envoyé');
            break;
    }
}
}
