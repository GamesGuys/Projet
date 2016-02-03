<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Clan; //référence à la classe Clan qui correspond aux clans de joueurs

class ClanController extends Controller
{
    function index(){
    	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
		$clans = Clan::get();
		//affichage des bateaux
		$tabClans = array();
		foreach ($clans as $clan) {
			$tabClans[] = $clan;
		}
		$jsonClans = json_encode($tabClans);
		echo $jsonClans;
    }

    function showAction($id){
    	$clan = Clan::find($id); //récupération du bateau d'id $id
		echo json_encode($clan);
    }

    function putAction($id){
    	
    }
}
