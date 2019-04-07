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

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

//POST URLS
Route::post('/v1/login', 'API\AuthController@Login');
Route::post('/v1/adminLogin','API\AuthController@adminLogin');
Route::post('/v1/save/existing','API\AuthController@save_existing');
Route::post('/v1/save/password', 'API\AuthController@savePassword');
Route::post('/v1/save/new','API\AuthController@save_new')->middleware('auth:api');
Route::post('/v1/saveProfile','API\AuthController@saveProfile')->middleware('auth:api');
Route::post('/v1/saveDuePayment','API\AuthController@saveDuePayment')->middleware('auth:api');
Route::post('/v1/attendFreeEvent','API\AuthController@attendFreeEvent')->middleware('auth:api');
Route::post('/v1/removeFreeEvent', 'API\AuthController@removeFreeEvent')->middleware('auth:api');
Route::post('/v1/attendEvent', 'API\AuthController@attendEvent')->middleware('auth:api');
Route::post('/v1/changePassword', 'API\AuthController@changePassword')->middleware('auth:api');
Route::post('/v1/iVote','API\AuthController@iVote')->middleware('auth:api');

//GET URLS
Route::get('/v1/verify/{matric}','API\AuthController@verify');
Route::get('/v1/announcements','API\AuthController@announcements')->middleware('auth:api');
Route::get('/v1/allEvents','API\AuthController@allEvents')->middleware('auth:api');
Route::get('/v1/tutorials/{level}','API\AuthController@tutorials')->middleware('auth:api');
Route::get('/v1/events/{id}','API\AuthController@events')->middleware('auth:api');
Route::get('/v1/dues/{id}','API\AuthController@dues')->middleware('auth:api');
Route::get('/v1/profile/{slug}','API\AuthController@profile')->middleware('auth:api');
Route::get('/v1/allPolls','API\AuthController@allPolls')->middleware('auth:api');