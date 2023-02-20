<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Referentiel;
use Illuminate\Http\Request;

class controllerStatistiques extends Controller
{
    public function stats(){
        // stats pour age
        $ageData = Candidat::select('id','age')->get()->groupBy(function($ageData){
            return $ageData->age;
         });
             $ages = [];
             $ageCpt = [];
         foreach($ageData as $age => $values){
             $ages[] = $age;
             $ageCpt[] = count($values);
         }
         // Fin stats pour age

         //Stats pour sexe
     
         $sexeData = Candidat::select('id','sexe')->get()->groupBy(function($sexeData){
             return $sexeData->sexe;
         });
         $sexes = [];
         $sexeCpt = [];
         foreach($sexeData as $sexe => $values){
             $sexes[] = $sexe;
             $sexeCpt[] = count($values);
         }
         //Fin stats pour sexe

         $formations = Formation::get();
         $referentiels = Referentiel::all();
        

     
         return view('/pages/statistiques/statistiques', compact('ageData','ages', 'ageCpt',
          'sexeData', 'sexes', 'sexeCpt', 'formations', 'referentiels'));
    }
}
