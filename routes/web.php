<?php

use Illuminate\Support\Facades\Route;
use App\Models\Process;

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

/* PA: fixed undefined variable error re https://www.reddit.com/r/laravel/comments/w0rbm8/undefined_variable_error/
* and by adding import statement at top for use of 'Process' below
*/
Route::get('/', function () {
    return view('processes/index', ['processes' => Process::all()]);
});

Route::resource('processes', 'App\Http\Controllers\ProcessController');
// PA: addeded route for vue bootstrap model per https://fahmidasclassroom.com/laravel-7-crud-using-bootstrap-modal/
//Route::get('processes/{id}/edit/', 'ProcessController@edit');