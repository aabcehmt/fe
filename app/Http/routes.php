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

/**
 * Route::pattern('var','expresion_regular')
 *
 * Esta función, permite definirle una propiedad a una variable.
 *
 * Route::get('admin/sections/{id}', function ($id) { ... });	
 * En este caso, cada vez que se pase la variable id en la ruta, deberá ser si o si un numero.
 */
Route::pattern('id','\d+');

Route::get('zeta/{id}', function ($id) {
	return 'Accediendo a ' . $id;
});	

// Filtro definido en 
Route::when('*','csrf',['post']);

// Por defecto tiene las funciones create,store,show,edit,update,destroy 
// que se crean al crear el controlador desde linea de comando.
Route::resource('cities/localidades','cities\LocalidadController');
Route::resource('cities/calles','cities\CalleController');
Route::resource('people/personas','people\PersonasController');
Route::resource('admin/users','UserController');
Route::get('home', function () {
    return view('admin/home');
});

Route::get('/aleator', function () {
    return view('aleator/aleator/index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/login', function () {
    return view('auth/login');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'admin' => 'Auth\AuthController'
]);

/*Route::group([ 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
	Route::resource('users','UsersController');
});*/