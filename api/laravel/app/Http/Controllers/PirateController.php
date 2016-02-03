<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pirate; //référence à la classe Pirate qui correspond aux joueur

class PirateController extends Controller
{
    function index(){
    	$pirates = Pirate::get();
		//affichage des bateaux
		$tabpirates = array();
		foreach ($pirates as $pirate) {
			$tabpirates[] = $pirate;
		}
		$jsonPirs = json_encode($tabpirates);
		echo $jsonPirs;
    }

    function showAction($id){
    	$pirate = Pirate::find($id); //récupération du bateau d'id $id
		echo json_encode($pirate);
    }

    function putAction($id){
    	
    }
}
