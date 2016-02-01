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
	$bateau = Bateau::find($id); //récupération du bateau d'id $id
	echo json_encode($bateau);
});

Route::put('bateaux/{id}', function($id){
	//$data = Input::all();
    //print_r($data);
    return response()->json([
    		"msg" => "Sucess",
    		"cool" => "nice"
    	], 200
    );
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


Route::get('token', function () {
       return csrf_token();
   });