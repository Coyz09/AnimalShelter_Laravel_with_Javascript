<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/animal/all',['uses' => 'AnimalController@getAnimalAll','as' => 'animal.getanimalall'] );
Route::post('/animal',['uses' => 'AnimalController@store','as' => 'animal.store'] );
Route::get('/animal/{id}/edit',['uses' => 'AnimalController@edit','as' => 'animal.edit'] );
Route::patch('/animal/{id}',['uses' => 'AnimalController@update','as' => 'animal.update'] );
Route::delete('/animal/{id}',['uses' => 'AnimalController@destroy','as' => 'animal.destroy'] );
Route::resource('animal', 'AnimalController');

Route::get('/personnel/all',['uses' => 'PersonnelController@getPersonnelAll','as' => 'personnel.getpersonnelall']);
Route::post('/personnel',['uses' => 'PersonnelController@store','as' => 'personnel.store'] );
Route::get('/personnel/{id}/edit',['uses' => 'PersonnelController@edit','as' => 'personnel.edit'] );
Route::patch('/personnel/{id}',['uses' => 'PersonnelController@update','as' => 'personnel.update'] );
Route::delete('/personnel/{id}',['uses' => 'PersonnelController@destroy','as' => 'personnel.destroy'] );
Route::resource('personnel', 'PersonnelController');


Route::get('/rescuer/all',['uses' => 'RescuerController@getRescuerAll','as' => 'rescuer.getrescuerall'] );
Route::post('/rescuer',['uses' => 'RescuerController@store','as' => 'rescuer.store'] );
Route::get('/rescuer/{id}/edit',['uses' => 'RescuerController@edit','as' => 'rescuer.edit'] );
Route::patch('/rescuer/{id}',['uses' => 'RescuerController@update','as' => 'rescuer.update'] );
Route::delete('/rescuer/{id}',['uses' => 'RescuerController@destroy','as' => 'rescuer.destroy'] );
Route::resource('rescuer', 'RescuerController');


Route::get('/adopter/all',['uses' => 'AdopterController@getAdopterAll','as' => 'adopter.getadopterall'] );
Route::post('/adopter',['uses' => 'AdopterController@store','as' => 'adopter.store'] );
Route::post('/register',['uses' => 'AdopterController@register','as' => 'adopter.register'] );
Route::get('/adopter/{id}/edit',['uses' => 'AdopterController@edit','as' => 'adopter.edit'] );
Route::patch('/adopter/{id}',['uses' => 'AdopterController@update','as' => 'adopter.update'] );
Route::delete('/adopter/{id}',['uses' => 'AdopterController@destroy','as' => 'adopter.destroy'] );
Route::resource('adopter', 'AdopterController');

Route::get('/injury/all',['uses' => 'InjuryController@getInjuryAll','as' => 'injury.getinjuryall'] );
Route::post('/injury',['uses' => 'InjuryController@store','as' => 'injury.store'] );
Route::get('/injury/{id}/edit',['uses' => 'InjuryController@edit','as' => 'injury.edit'] );
Route::patch('/injury/{id}',['uses' => 'InjuryController@update','as' => 'injury.update'] );
Route::delete('/injury/{id}',['uses' => 'InjuryController@destroy','as' => 'injury.destroy'] );
Route::resource('injury', 'InjuryController');

Route::get('/adopters/all',['uses' => 'HomepageController@getAdopterAll','as' => 'adopters.getadoptersall'] );
Route::get('/animals/all',['uses' => 'HomepageController@getAnimalAll','as' => 'animals.getanimalsall'] );

Route::get('/rescued/all',['uses' => 'DashboardController@getRescued','as' => 'rescued.getrescuedall'] );

Route::get('/adopted/all',['uses' => 'DashboardController@getAdopted','as' => 'rescued.getadoptedall'] );

Route::resource('dashboard', 'DashboardController');

Route::get('/requests/getrequests',['uses' => 'PersonnelController@getRequestsAll','as' => 'personnel.getrequestall']);
   Route::post('/requests/{id}',['uses' => 'PersonnelController@acceptrequest','as' => 'personnel.getrequest']);

Route::post('/adopterprofile/{id}/edit', [
       'uses' => 'AdopterController@updateprofile',
       'as' => 'adopterupdate.profile', 
        ]);