<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Coffre; //référence à la classe Coffre qui correspond aux coffres déposés par les joueurs

class CoffreController extends Controller
{
    function index(){
    	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
		$coffres = Coffre::get();
		//affichage des bateaux
		$tabCoffre = array();
		foreach ($coffres as $coffre) {
			$tabCoffre[] = $coffre;
		}
		$jsonCoffres = json_encode($tabCoffre);
		echo $jsonCoffres;
    }

    function showAction($id){
    	$coffre = Coffre::find($id); //récupération du bateau d'id $id
		echo json_encode($coffre);
    }

    function putAction($id){
    	
    }
}
