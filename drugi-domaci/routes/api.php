<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrijavaController;
use App\Http\Controllers\TerminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;

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

Route::get('/termini/getAll', [TerminController::class, 'getTermini']);
Route::get('/termin/{id}', [TerminController::class, 'showTermin']);
Route::get('/termin/{id}/prijave', [TerminController::class, 'showTerminsPrijave']);

Route::get('/users/getAll', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user/{id}/prijave', [UserController::class, 'showUsersPrijave']);

Route::get('/prijave', [PrijavaController::class, 'getPrijave']);
Route::get('/prijava/{id}', [PrijavaController::class, 'showPrijava']);

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/profile', function(Request $request){
        return auth()->user();
    });
    Route::resource('prijave', PrijavaController::class)->only(['store']);

    Route::post('/logout', [AuthController::class, 'logout']);
});



