<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Bateau; //référence à la classe Bateau
use App\Pirate; //référence à la classe Pirate qui correspond aux joueur
use App\Clan; //référence à la classe Clan qui correspond aux clans de joueurs
use App\Coffre; //référence à la classe Coffre qui correspond aux coffres déposés par les joueurs
use App\Lc; //référence à la classe Coffre qui correspond aux coffres déposés par les joueurs

use Illuminate\Http\Request;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//////////////////////////
//Route des joueurs
////////////////////////

Route::get('joueurs', function(){
	$pirates = Pirate::get();
		//affichage des bateaux
		$tabpirates = array();
		foreach ($pirates as $pirate) {
			$tabpirates[] = $pirate;
		}
		$jsonPirs = json_encode($tabpirates);
		echo $jsonPirs;
});

Route::get('joueurs/{id}', function($id){
		$pirate = Pirate::find($id); //récupération du bateau d'id $id
		echo json_encode($pirate);
});

//////////////////////////
//Route des bateaux
////////////////////////

Route::get('bateaux', function(){
	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
	$bateaux = Bateau::get();
	//affichage des bateaux
	$tabBateau = array();
	foreach ($bateaux as $bateau) {
		$tabBateau[] = $bateau;
	}
	$jsonBatx = json_encode($tabBateau);
	echo $jsonBatx;
});

Route::get('bateaux/{id}', function($id){
	$bateau = Bateau::f

Route::put('bateaux/{id}', function($id){
    //header("Access-Control-Allow-Origin: *");

    $data = Input::json();
	
    $dataLen = count($data);

	/*
		json be like {"id":1,"nombateau" : "lol", "vieact" : 451, "goldact" : 4512, "rhumact" : 450, "nivcalles" : 2, "nivcanons": 3, "nivpont" : 1, "nivmat": 12, "nivbarre": 10, "nivcoque": 10, "idpirate": 1}
	*/


	$bateau = Bateau::find($data->get('id')); //where we'll modify

	if($data::has('vieact')){
		$bateau->VIEACT = $data->get('vieact');
	};

   	return response()->json([
});

//////////////////////////
//Route des clans
////////////////////////

Route::get('clans', function(){
	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
	$clans = Clan::get();
	//affichage des bateaux
	$tabClans = array();
	foreach ($clans as $clan) {
		$tabClans[] = $clan;
	}
	$jsonClans = json_encode($tabClans);
	echo $jsonClans;
});

Route::get('clans/{id}', function($id){
	$clan = Clan::find($id); //récupération du bateau d'id $id
	echo json_encode($clan);
});

//////////////////////////
//Route des coffres
////////////////////////
Route::get('coffres', function(){
	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
	$coffres = Coffre::get();
	//affichage des bateaux
	$tabCoffre = array();
	foreach ($coffres as $coffre) {
		$tabCoffre[] = $coffre;
	}
	$jsonCoffres = json_encode($tabCoffre);
	echo $jsonCoffres;
});

Route::get('coffres/{id}', function($id){
	$coffre = Coffre::find($id); //récupération du bateau d'id $id
	echo json_encode($coffre);
});

//////////////////////////
//Route des LC
////////////////////////
Route::get('lcs', function(){
	//récupération de la liste des bateaux en utilisant la méthode get de l'ORM Eloquent
	$lcs = lC::get();
	//affichage des bateaux
	$tabLc = array();
	foreach ($lcs as $lc) {
		$tabLc[] = $lc;
	}
	$jsonLc = json_encode($tabLc);
	echo $jsonLc;
});

Route::get('lcs/{id}', function($id){
	$lc = LC::find($id); //récupération du bateau d'id $id
	echo json_encode($lc);
});