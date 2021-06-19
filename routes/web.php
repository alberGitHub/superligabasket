<?php

use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProbarRoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
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

Route::get('/myteam/{locale?}', function ($locale='es'){ //Esto es para hacer que nuestra aplicacion sea multilingüe
    if (!in_array($locale,['en','es'])){
        abort('404');
    } else{
        App::setLocale($locale);
        return view('welcome');
    }
});



Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); /* ->middleware(['auth']) */

require __DIR__.'/auth.php';


Route::get('comment/{play_id}/create', [CommentController::class, 'create']);
Route::resource('comment', CommentController::class);
Route::resource('play', PlayController::class);
Route::resource('game',GameController::class); /* ->middleware(['auth','verified']); */
Route::resource('clasificacion', ClasificacionController::class);
Route::resource('team', TeamController::class);
Route::resource('player', PlayerController::class);
Route::resource('user', UserController::class)->middleware('auth');


Route::get('/roluser',[ProbarRoleController::class,'index']);
