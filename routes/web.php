<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Route::view('a-propos', 'a-propos');

//Clients
/*
Route::get('clients', 'ClientsController@index'); //Avant, ClientsController@list car nom de la fonction
Route::get('clients/create', 'ClientsController@create');
Route::post('clients', 'ClientsController@store');
Route::get('clients/{client}', 'ClientsController@show');
Route::get('clients/{client}/edit', 'ClientsController@edit');
Route::patch('clients/{client}', 'ClientsController@update');
Route::delete('clients/{client}', 'ClientsController@destroy');
*/
//Toutes les routes sont reprises dans la ligne en dessous
Route::resource('clients', 'ClientsController');
//->middleware('auth') à ajouter pour se connecter sans exceptions (voir clientcontroller)

//Contact
Route::get('contact', 'ContactController@create');
Route::post('contact', 'ContactController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Authentification
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
