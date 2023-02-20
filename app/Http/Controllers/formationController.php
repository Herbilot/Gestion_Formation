<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\FormationReferentiel;
use App\Models\Referentiel;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class formationController extends Controller
{

    public function listeformations(){
        $formations = Formation::get();
        return view('pages/formations/listeFormations', compact('formations'));
    }

    public function ajoutformation(){
        $titre = "Ajouter une formation";
        $fun = url('formations/enregister');
        $parm1 = old('nom');
        $parm2 = old('description');
        $parm3 = old('duree');
        $parm4 = old('debut');
        $parm5 = old('isStarted');
        return view('pages/formations/ajoutFormation', compact('titre', 'fun', 'parm1',
        'parm2','parm3','parm4','parm5'));
    }

   public function enregistrerFormation(Request $request){
    $formation = new Formation();
    $request->validate([
        "nom"=>"required",
        "duree"=>"required",
        "description"=>"required",
        "debut"=>"required",
        "isStarted"=>"required"
    ],
    [
        "nom.required" =>"Ce champ est obligatoire",
        "duree" =>"Ce champ est obligatoire",
        "description"=>"Ce champ est obligatoire",
        "debut"=>"Ce champ est obligatoire",
        "isStarted"=>"Ce champ est obligatoire"
    ]);
     $formation->nom = $request->nom;
     $formation->duree = $request->duree;
     $formation->description = $request->description;
     $formation->dateDebut = $request->debut;
     $formation->isStarted = $request->isStarted;
     $formation->save();

     return redirect('formations')->with('Success','Formation enregistrée avec succès !');

   }
   public function modifierFormation($id){
        $formation = formation::findOrFail($id);
        $parm1 = $formation->nom;
        $parm2 = $formation->description;
        $parm3 = $formation->duree;
        $parm4 = $formation->dateDebut;
        $parm5 = $formation->isStarted;    

        $titre = "Modifer une formation";
        $fun =  url('formations/'.$id.'/update');
        return view('pages/formations/ajoutFormation', compact('titre', 'fun', 'parm1',
                                        'parm2','parm3','parm4','parm5',));

   }
   public function majFormation($id, Request $request){
    $formation = formation::findOrFail($id);
    $request->validate([
        'nom' => 'required',
        'description' => 'required',
        'duree' => 'required',
        'debut' => 'required',
        'debut' => 'required',
        'isStarted' => 'required'
        
    ]);

    
    $formation->nom = $request->nom;
    $formation->description = $request->description;
    $formation->duree = $request->duree;
    $formation->dateDebut = $request->debut;
    $formation->isStarted = $request->isStarted;
    $formation->update();
    
    return redirect('formations')->with('success', 'formation mofifiée avec succès !');
}

   public function detailsformation($id){
    $formation = Formation::findOrFail($id);
    $referentiels = Referentiel::get();
    return view('pages/formations/detailsformation', compact('formation', 'referentiels'));

   }

   public function supprimerFormation($id){
    $formation = formation::FindOrFail($id);
    $formation->delete();
    return redirect('formations')->with('success', 'Formation supprimée avec succès !');
   }

   public function rechercheFormation(Request $request){
    $terme = trim($request->recherche);
    $resultat = formation::query()->where('nom', 'ilike', "%{$terme}%")->orWhere('description', 'like', "%{$terme}%")->get();
    $func = url('formations/rechercher');
    $test = $terme;
    return view('pages/recherche/rechercheFormation', compact('resultat', 'test'));

   }

   public function ajoutReferentiel(Request $request, $id){
    $formation = new FormationReferentiel();
    $formation->formation_id = $id;
    $formation->referentiel_id =request('formation');
    $formation->save();

    return redirect('formations/'.$id.'/details')->with('success', 'référentiel ajoutée au referentiel avec succès !');

}
}
