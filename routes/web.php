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

//Route::get('/', function () {
//    return 'Home';
//});

//Route::get('/menu', 'UserController@menu')
//    ->name('users');

//----------------------------------------------------------------------------------------------USERS

Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');

Route::post('/usuarios', 'UserController@store');

Route::get('/usuarios/{user}/editar', 'UserController@edit')
    ->where('id', '\d+')
    ->name('users.edit');

Route::put('/usuarios/{user}', 'UserController@update');

Route::delete('/usuarios/{user}', 'UserController@destroy')
    ->name('users.destroy');

Auth::routes();

//----------------------------------------------------------------------------------------------JOBS

Route::get('/trabajos', 'JobsController@jobs')
    ->name('jobs.jobs');

//----------------------------------------------------------------------------------------------CALLS

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('calls.index', 'CallController@index')
    ->name('calls.index');

Route::get('/llamadas/nuevo', 'CallController@create')
    ->name('calls.create');

Route::get('/llamadas/{call}', 'CallController@show')
    ->name('calls.show');

Route::post('/llamadas', 'CallController@store');

Route::get('/llamadas/{call}/editar', 'CallController@edit')
    ->where('id', '\d+')
    ->name('calls.edit');

Route::put('/llamadas/{call}', 'CallController@update');

Route::delete('/llamadas/{call}', 'CallController@destroy')
    ->name('calls.destroy');


//----------------------------------------------------------------------------------------------CLIENTS

Route::get('/clientes', 'ClientController@index')
    ->name('clients.index');

Route::get('/llamadas/{client}/editar', 'ClientController@edit')
    ->where('id', '\d+')
    ->name('clients.edit');

Route::delete('/clientes/{client}', 'ClientController@destroy')
    ->name('clients.destroy');
