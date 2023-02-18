<?php

use App\Http\Controllers\candidatController;
use App\Http\Controllers\formationController;
use App\Models\Candidat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/pages/layouts/master');
});
Route::get('/tableau-bord', function () {
    $ageData = Candidat::select('id','age')->get()->groupBy(function($ageData){
       return $ageData->age;
    });
        $ages = [];
        $ageCpt = [];
    foreach($ageData as $age => $values){
        $ages[] = $age;
        $ageCpt[] = count($values);
    }

    $sexeData = Candidat::select('id','sexe')->get()->groupBy(function($sexeData){
        return $sexeData->sexe;
    });
    $sexes = [];
    $sexeCpt = [];
    foreach($sexeData as $sexe => $values){
        $sexes[] = $sexe;
        $sexeCpt[] = count($values);
    }

    return view('/pages/statistiques/statistiques', compact('ageData','ages', 'ageCpt',
     'sexeData', 'sexes', 'sexeCpt'));
});

/*Routes pour les formations*/
Route::get("/formations", [formationController::class, "listeformations"]);
Route::get("formations/ajouter", [formationController::class, "ajoutformation"]);
Route::post("formations/enregister", [formationController::class, "enregistrerformation"]);

/*Routes pour les candidats*/
Route::get("/candidats", [candidatController::class, "listecandidats"]);
Route::get("/candidats/{id}/details", [candidatController::class, "detailscandidat"]);
Route::get("/candidats/ajouter", [candidatController::class, "ajoutcandidat"]);
Route::post("/candidats/enregistrer", [candidatController::class, "enregistrercandidat"]);
Route::get("/candidats/{id}/modifier", [candidatController::class, "modifierCandidat"]);
Route::post("/candidats/{id}/update", [candidatController::class, "majCandidat"]);
Route::get("/candidats/{id}/supprimer", [candidatController::class, "supprimerCandidat"]);