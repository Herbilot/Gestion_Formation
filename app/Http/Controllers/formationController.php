<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class formationController extends Controller
{

    public function listeformations(){
        return view('pages/formations/listeFormations');
    }

    public function ajoutformation(){

        return view('pages/formations/ajoutFormation');
    }

    public function enregistrerformation(Request $request){
        $request->validate([
            "nom" => "required",
            "description" => "required",
            "duree" => "required",
            "isStarted" => "required",
            "debut" => "required",
        ]);

        $formation = new Formation();
        $formation->nom = $request->nom;
        $formation->description = $request->description;
        $formation->duree = $request->duree;
        $formation->isStarted = $request->isStarted;
        $formation->dateDebut = $request->dateDebut;
        $formation->save();
        
        return redirect("candidats")->with('success', 'Candidat enregistré avec succès !');
    }
}
