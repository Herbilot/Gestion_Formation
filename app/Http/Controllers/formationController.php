<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class formationController extends Controller
{

    public function listeformations(){
        $formations = Formation::get();
        return view('pages/formations/listeFormations', compact('formations'));
    }

    public function ajoutformation(){

        return view('pages/formations/ajoutFormation');
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

   public function detailsformation($id){
    return view('pages/formations/detailsformation');

   }

   public function supprimerFormation($id){
    $formation = formation::FindOrFail($id);
    $formation->delete();
    return redirect('formations')->with('success', 'Formation supprimée avec succès !');
   }

   public function rechercheFormation(Request $request){
    $terme = trim($request->recherche);
    $resultat = formation::query()->where('nom', 'like', "%{$terme}%")->orWhere('description', 'like', "%{$terme}%")->get();
    $func = url('formations/rechercher');
    $test = $terme;
    return view('pages/recherche/recherche', compact('resultat', 'test'));

   }
}
