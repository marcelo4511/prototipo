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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/amigos', 'AmigoController@index')->name('amigos');
    Route::get('amigos/create', 'AmigoController@create');
    Route::get('amigos/search', 'AmigoController@filter');
    Route::post('amigos', 'AmigoController@uploadFile');
    Route::delete('amigos/{id}','AmigoController@destroy');
    
    Route::prefix('config')->group(function () {
    Route::get('/categorias','CategoryController@index')->name('categorias.index');
    Route::get('categorias/create','CategoryController@create')->name('categorias.create');
    Route::delete('categorias/{id}','CategoryController@destroy')->name('categorias.destroy');
    
    Route::get('/clientes','ClienteController@index')->name('clientes.index');
    Route::get('clientes/create','ClienteController@create')->name('clientes.create');
    
    
    Route::get('/users','UsuariosController@index')->name('users.index');
    
});
Route::post('/clientes','ClienteController@store')->name("clientes");
    Route::post('/categorias','CategoryController@store')->name("categorias");
    Route::post('/relacionamento','RelacionamentoController@store')->name("relacionamento.store");
    Route::get('/relacionamento','RelacionamentoController@index')->name("relacionamento.index");

});