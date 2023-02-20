<?php

use App\Http\Controllers\candidatController;
use App\Http\Controllers\controllerStatistiques;
use App\Http\Controllers\formationController;
use App\Http\Controllers\referentielController;
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
Route::get('/tableau-bord', [controllerStatistiques::class,"stats"]);

/*Routes pour les formations*/
Route::get("/formations", [formationController::class, "listeformations"]);
Route::get("/formations/{id}/details", [formationController::class, "detailsformation"]);
Route::get("formations/ajouter", [formationController::class, "ajoutformation"]);
Route::post("formations/enregister", [formationController::class, "enregistrerformation"]);
Route::get("/formations/{id}/modifier", [formationController::class, "modifierFormation"]);
Route::post("/formations/{id}/update", [formationController::class, "majFormation"]);
Route::get("/formations/{id}/supprimer", [formationController::class, "supprimerFormation"]);
Route::get("/formations/rechercher", [formationController::class, "rechercheFormation"]);
Route::get("/formations/{id}/ajout-referentiel", [formationController::class, "ajoutReferentiel"]);

/*Routes pour les candidats*/
Route::get("/candidats", [candidatController::class, "listecandidats"]);
Route::get("/candidats/{id}/details", [candidatController::class, "detailscandidat"]);
Route::get("/candidats/ajouter", [candidatController::class, "ajoutcandidat"]);
Route::post("/candidats/enregistrer", [candidatController::class, "enregistrercandidat"]);
Route::get("/candidats/{id}/modifier", [candidatController::class, "modifierCandidat"]);
Route::post("/candidats/{id}/update", [candidatController::class, "majCandidat"]);
Route::get("/candidats/{id}/supprimer", [candidatController::class, "supprimerCandidat"]);
Route::get("/candidats/{id}/ajout-formation", [candidatController::class, "ajoutFormation"]);

/*Route pour les référentiels*/
Route::get("/referentiels", [referentielController::class, "listereferentiel"]);
Route::get("/referentiels/ajouter", [referentielController::class, "ajouterReferentiel"]);
Route::post("/referentiels/enregistrer", [referentielController::class, "enregistrerReferentiel"]);
Route::get("/referentiels/{id}/details", [referentielController::class, "detailsreferentiel"]);
Route::get("/referentiels/{id}/ajout-formation", [referentielController::class, "ajoutFormation"]);