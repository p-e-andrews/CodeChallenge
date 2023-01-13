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

//Route::get('/', function () {
//    return view('welcome');
//});

//PA: added updated route for blade and vue
//Route::get('processes', 'ProcessController@index')->name('process.index');

// PA: added updated route re API tutorial on positronx.io
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');


// PA: commented out route during API overhaul for blade removal
//Route::resource('processes', 'App\Http\Controllers\ProcessController');
// PA: addeded route for vue bootstrap model per https://fahmidasclassroom.com/laravel-7-crud-using-bootstrap-modal/
//Route::get('processes/{id}/edit/', 'ProcessController@edit');