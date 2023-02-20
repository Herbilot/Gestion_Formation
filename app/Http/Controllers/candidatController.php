<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\CandidatFormation;
use App\Models\Formation;
use Illuminate\Http\Request;

class candidatController extends Controller
{
    public function listecandidats(){

        $candidats = Candidat::get()->sortBy(function($candidats){
            return $candidats->id;
        });
        return view('pages/candidats/listeCandidats', (compact('candidats')));
    }


    public function ajoutcandidat(){
        $titre = "Ajouter un candidat";
        $fun = url('candidats/enregistrer');
        $parm1 = old('nom');
        $parm2 = old('prenom');
        $parm3 = old('email');
        $parm4 = old('age');
        $parm5 = old('sexe');
        $parm6 = old('niveauEtude');
        return view('pages/candidats/ajout', compact('titre', 'fun', 'parm1',
        'parm2','parm3','parm4','parm5','parm6'));
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
        $f = [];
        foreach ($candidat->formations as $formation){
            $f[] = $formation;
        }
        $formations = Formation::get();

        return view('pages/candidats/detailsCandidat', compact('candidat', 'formations','f'));
    }

    public function modifierCandidat(Request $request, $id){
        
        $candidat = candidat::findOrFail($id);
        $parm1 = $candidat->nom;
        $parm2 = $candidat->prenom;
        $parm3 = $candidat->email;
        $parm4 = $candidat->age;
        $parm5 = $candidat->sexe;
        $parm6 = $candidat->niveauEtude;

        

        $titre = "Modifer un candidat";
        $fun =  url('candidats/'.$id.'/update');
        return view('pages/candidats/ajout', compact('titre', 'fun', 'parm1',
                                        'parm2','parm3','parm4','parm5','parm6'));
    }

    public function majCandidat($id, Request $request){
        $candidat = candidat::findOrFail($id);
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'age' => 'required',
            
        ]);

        
        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->email = $request->email;
        $candidat->age = $request->age;
        $candidat->sexe = $request->sexe;
        $candidat->niveauEtude = $request->niveauEtude;
        $candidat->update();
        
        return redirect('candidats')->with('success', 'candidat mofifié avec succès !');
    }

    public function supprimerCandidat($id){
        $candidat = candidat::findOrFail($id);
        $candidat->delete();
        return redirect('candidats')->with('success', 'Candidat supprimé avec succès !');
    }

    public function ajoutFormation(Request $request, $id){
        $formation = new CandidatFormation();
        $formation->candidat_id = $id;
        $formation->formation_id =request('formation');
        $formation->save();

        return redirect('candidats/'.$id.'/details')->with('success', 'formation ajoutée au referentiel avec succès !');

    }

    public function rechercheCandidat(Request $request){
        $terme = trim($request->recherche);
        $resultat = Candidat::query()->where('nom', 'ilike', "%{$terme}%")->orWhere('prenom', 'ilike', "%{$terme}%")->get();
        
        return view('pages/recherche/rechercheCandidat', compact('resultat'));
    }

}
