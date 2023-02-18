<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formationController extends Controller
{

    public function listeformations(){
        return view('pages/formations/listeFormations');
    }
    public function ajoutformation(){

        return view('pages/formations/ajoutFormation');
    }
}
