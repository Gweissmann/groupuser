<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/user/{barcode}','ReportController@api');
Route::get('/line','ReportController@lines');
Route::get('/station','ReportController@stations');
Route::get('/user/update/{station_id}/{access_id}/{data}','StationController@updateStationAccess');
Route::get('/station/test/update/{station_id}/{data}','StationController@updateStationTest');

//Route::get('/station','ReportController@stations');
