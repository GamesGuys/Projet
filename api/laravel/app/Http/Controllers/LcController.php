<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lc; //référence à la classe Coffre qui correspond aux coffres déposés par les joueurs

class LcController extends Controller
{
    function index(){
    	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
		$lcs = lC::get();
		//affichage des bateaux
		$tabLc = array();
		foreach ($lcs as $lc) {
			$tabLc[] = $lc;
		}
		$jsonLc = json_encode($tabLc);
		echo $jsonLc;
    }

    function showAction($id){
		$lc = LC::find($id); //récupération du bateau d'id $id
		echo json_encode($lc);
	}

    function putAction($id){
    	
    }
}
