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

Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/trabajos', 'JobsController@jobs')
    ->name('jobs.jobs');

Route::get('/trabajos/nuevo', 'JobsController@jobs')
    ->name('jobs.create');

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

Route::get('/saludo/{name}', 'WelcomeUserController@index');

Route::get('/saludo/{name}/{nickname}', 'WelcomeUserController@index2');

Route::delete('/usuarios/{user}', 'UserController@destroy')
    ->name('users.destroy');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//----------------------------------------------------------------------------------------------CALLS

Route::get('/llamadas/{call}', 'HomeController@show')
    ->name('calls.show');

Route::get('/llamadas/nuevo', 'HomeController@create')
    ->name('calls.create');

Route::post('/llamadas', 'HomeController@store');

Route::get('/llamadas/{call}/editar', 'HomeController@edit')
    ->where('id', '\d+')
    ->name('calls.edit');

Route::put('/llamadas/{call}', 'HomeController@update');

Route::delete('/llamadas/{call}', 'HomeController@destroy')
    ->name('calls.destroy');

