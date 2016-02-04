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
Route::get('joueurs', array('as' => 'listJoueurs', 'uses' => 'PirateController@index'));
Route::get('joueurs/{id}', array('as' => 'showJoueur', 'uses' => 'PirateController@showAction'));

//////////////////////////
//Route des bateaux
////////////////////////

Route::get('bateaux', array('as' => 'listBateaux', 'uses' => 'BateauController@index'));
Route::get('bateaux/{id}', array('as' => 'showBateau', 'uses' => 'BateauController@showAction'));
Route::put('bateaux/{id}', array('as' => 'updateBateau', 'uses' => 'BateauController@putAction'));

//////////////////////////
//Route des clans
////////////////////////

Route::get('clans', array('as' => 'listClans', 'uses' => 'ClanController@index'));
Route::get('clans/{id}', array('as' => 'showClan', 'uses' => 'ClanController@showAction'));

//////////////////////////
//Route des coffres
////////////////////////
Route::get('coffres', array('as' => 'listCoffres', 'uses' => 'CoffreController@index'));
Route::get('coffres/{id}', array('as' => 'showCoffre', 'uses' => 'CoffreController@showAction'));

//////////////////////////
//Route des LC
////////////////////////
Route::get('lcs', array('as' => 'listLcs', 'uses' => 'LcController@index'));
Route::get('lcs/{id}', array('as' => 'showLc', 'uses' => 'LcController@showAction'));