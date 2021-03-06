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

// DashboardRoute::get('/', function () {
//     return view('welcome');
// });

if (App::environment('production')) {
  URL::forceScheme('https');
}

Route::get('/','TodosController@index'); 
Route::resource('todos','TodosController');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


