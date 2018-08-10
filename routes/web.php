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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/token', 'Auth\TokenController@token');


//Module Station
Route::resource('/line', 'LineController');

//Module AccessUser
Route::resource('/access_user', 'AccessUserController');

//Module Station
Route::resource('/station', 'StationController');
Route::post('/station/add-acceess-user', 'StationController@addAccessUsers')->name('station.adduser');
Route::post('/station/destroy-acceess-user', 'StationController@destroyAccessUser')->name('station.destroyuser');

//Module Reports
Route::get('/reports','ReportController@index')->name('reports.index');
Route::get('/reports/search/','ReportController@search')->name('reports.search');

//Module Users
Route::resource('users', 'UserController', ['only' => ['index', 'edit', 'update', 'destroy']]);
