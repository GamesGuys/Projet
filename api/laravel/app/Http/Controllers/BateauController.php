<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bateau; //référence à la classe Bateau

class BateauController extends Controller
{
    function index(){
    	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
		$bateaux = Bateau::get();
		//affichage des bateaux
		$tabBateau = array();
		foreach ($bateaux as $bateau) {
			$tabBateau[] = $bateau;
		}
		$jsonBatx = json_encode($tabBateau);
		echo $jsonBatx;
    }

    function showAction($id){
    	$bateau = Bateau::find($id); //récupération du bateau d'id $id
		echo json_encode($bateau);
    }

    function putAction($id){
    	/*
		json be like {"NOMBATEAU" : "lol", "VIEACT" : 451, "GOLDACT" : 4512, "RHUMACT" : 450, "NIVCALLES" : 2, "NIVCANONS": 3, "NIVPONT" : 1, "NIVMAT": 12, "NIVBARRE": 10, "NIVCOQUE": 10, "IDPIRATE": 1}*/
	    $data = Input::json(); //Get datas to change
	    $bateau = Bateau::find($id); //get the boat where to update stats
		
	    $dataLen = count($data); //count how many datas we'll be update

		if ($bateau->update($data->all(), $id)) 
	    {
	        return response()->json(['result' => 'success']);
	    }else{
			return response()->json(['niceru' => 'FUCK']);
	    }
    }
}
