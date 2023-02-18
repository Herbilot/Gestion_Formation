<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use Illuminate\Http\Request;

class candidatController extends Controller
{
    public function listecandidats(){

        $candidats = Candidat::get();
        return view('pages/candidats/listeCandidats', (compact('candidats')));
    }


    public function ajoutcandidat(){

        return view('pages/candidats/ajout');
    }

    public function enregistrercandidat(Request $request){
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "email" => "required",
            "age" => "required",
            "sexe" => "required",
            "niveauEtude" => "required",
        ]);

        $candidat = new Candidat();
        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->email = $request->email;
        $candidat->age = $request->age;
        $candidat->sexe = $request->sexe;
        $candidat->niveauEtude = $request->niveauEtude;
        $candidat->save();
        
        return redirect("candidats")->with('success', 'Candidat enregistré avec succès !');
    }

    public function detailscandidat($id){
        $candidat = Candidat::where('id', '=', $id)->first();

        return view('pages/candidats/detailsCandidat', compact('candidat'));
    }

    

}
