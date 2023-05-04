<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'role:admin'], function() {
Route::resource('animal', 'AnimalController');

Route::resource('personnel', 'PersonnelController');

Route::resource('rescuer', 'RescuerController');

Route::resource('adopter', 'AdopterController');

Route::resource('injury', 'InjuryController');

Route::resource('dashboard', 'DashboardController');


});


Route::get('/adopters', [
    'uses' => 'HomepageController@adopters',
    'as' => 'homepage.adopters'
]);

Route::get('/animals', [
    'uses' => 'HomepageController@animals',
    'as' => 'homepage.animals'
]);

Route::get('/homes', [
    'uses' => 'HomepageController@homes',
    'as' => 'homepage.animals'
]);

Route::get('/adoptersignup', [
       'uses' => 'UserController@index',
       'as' => 'user.signupadopter',
        ]);
 Route::post('/adoptersignup', [
       'uses' => 'AdopterController@store',
       'as' => 'user.signupadoptersave', 
        ]);

Route::group(['middleware' => 'role:adopter'], function() {


Route::get('/adopterprofile/{id}/edit', [
       'uses' => 'AdopterController@editprofile',
       'as' => 'adopteredit.profile', 
        ]);


Route::get('/adopterprofile', [
       'uses' => 'AdopterController@showprofile',
       'as' => 'adopter.profile', 
        ]);
});

Route::post('logout', [
        'uses' => 'AdopterController@getLogout',
        'as' => 'logout',
        ]);

 Route::get('showanimal/{id}', [
        'uses' => 'frontController@showanimal',
        'as' => 'front.showanimal',
     ]);

Route::get('/search', 'Search@index');
Route::get('/search/action', 'Search@action')->name('search.action');

 Route::post('postComment', ['uses'=> 'frontController@postComment', 'as' 
     => 'animal.comment']);

Route::get('/', [
        'uses' => 'HomepageController@animals',
        'as' => 'home.frontpage',
            ]);
 Route::get('/requests',['uses' => 'PersonnelController@showRequests','as' => 'personnel.getrequest']);


Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::fallback(function(){
    return redirect()->back();
});