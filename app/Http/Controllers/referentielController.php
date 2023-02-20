<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\FormationReferentiel;
use App\Models\FormationReferentiels;
use App\Models\Referentiel;
use App\Models\Type;
use Illuminate\Http\Request;

class referentielController extends Controller
{
    public function listereferentiel(){
        $referentiel = Referentiel::get();
        return view('pages/referentiel/listereferentiel', compact('referentiel'));
    }

    public function ajouterReferentiel(){
        return view('pages/referentiel/ajoutreferentiel');
    }

    public function enregistrerReferentiel(Request $request){
        $request->validate([
            "libelle" => "required",
            "validated" => "required",
            "horaire" => "required",
            "type" => "required",
        ]);
        	
        $referentiel = new Referentiel();
        $referentiel->libelle = $request->libelle;
        $referentiel->validated = $request->validated;
        $referentiel->horaire = $request->horaire;
        $referentiel->save();

        $type = new Type();
        $type->libelle = $request->type;
        $type->referentiel_id = $referentiel->id;

        $type->save();

        return redirect('referentiels')->with('success', 'Referentiel enregistré avec succès !');
    }

    public function detailsreferentiel($id){
        $referentiel = Referentiel::findOrFail($id);
        $type = Type::where('referentiel_id', '=', $id)->first();
        $formations = Formation::get();
        $validated = "";
        if($referentiel->validated == 0){
            $validated = "Non";
        }else{
            $validated = "Oui";
        }

        return view('pages/referentiel/detailsreferentiel', compact('referentiel', 'type', 'validated', 'formations'));

    }

    public function ajoutFormation($id){
        $formation = new FormationReferentiel();
        $formation->referentiel_id = $id;
        $formation->formation_id = request('formation');
        $formation->save();
        return redirect('referentiels/'.$id.'/details')->with('success', 'formation ajoutée au referentiel avec succès !');

    }
    public function rechercheReferentiel(Request $request){
        $terme = trim($request->recherche);
        $resultat = referentiel::query()->where('libelle', 'ilike', "%{$terme}%")->get();
        
        return view('pages/recherche/rechercheReferentiel', compact('resultat'));
    }
}
