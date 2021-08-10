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

Route::get('/trabajos', 'JobController@index')
    ->name('jobs.index');

Route::get('/trabajos/nuevo', 'JobController@create')
    ->name('jobs.create');

Route::post('/trabajos', 'JobController@store');

Route::post('/trabajos/{job}', 'JobController@jobfromcall');

Route::get('/trabajos/historico', 'JobController@histjob')
    ->name('jobs.histjobs');

Route::get('/trabajos/historico2', 'JobController@histjob2')
    ->name('jobs.histjobs2');

Route::get('/trabajos/{job}/editar', 'JobController@edit')
    ->where('id', '\d+')
    ->name('jobs.edit');

Route::put('/trabajos/{job}', 'JobController@update');

Route::get('/trabajos/contador', 'JobController@count')
    ->name('jobs.count');

Route::delete('/trabajos/{job}', 'JobController@destroy')
    ->name('jobs.destroy');

Route::delete('/trabajos/historico/{histjob}', 'JobController@histdestroy')
    ->name('jobs.histdestroy');
//----------------------------------------------------------------------------------------------CALLS



Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/llamadas', 'CallController@index')
    ->name('calls.index');

Route::get('/llamadas/nuevo', 'CallController@create')
    ->name('calls.create');

Route::post('/llamadas', 'CallController@store');

Route::get('/llamadas/{call}', 'CallController@jobfromcall')
    ->name('calls.jobfromcall');

Route::get('/llamadas/{call}/editar', 'CallController@edit')
    ->where('id', '\d+')
    ->name('calls.edit');

Route::put('/llamadas/{call}', 'CallController@update');

Route::delete('/llamadas/{call}', 'CallController@destroy')
    ->name('calls.destroy');


//----------------------------------------------------------------------------------------------CLIENTS

Route::get('/clientes', 'ClientController@index')
    ->name('clients.index');

Route::get('/clientes/nuevo', 'ClientController@create')
    ->name('clients.create');

Route::post('/clientes', 'ClientController@store');

Route::get('/clientes/{client}/editar', 'ClientController@edit')
    ->where('id', '\d+')
    ->name('clients.edit');

Route::put('/clientes/{client}', 'ClientController@update');

Route::delete('/clientes/{client}', 'ClientController@destroy')
    ->name('clients.destroy');

Route::get('/clientes/importacion', 'ClientController@showimport')
    ->name('clients.import');

Route::post('/clientes/importacion', 'ClientController@import');