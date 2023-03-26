<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\marqueController;
use App\Http\Controllers\typemoteurController;
use App\Http\Controllers\typevoitureController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\LocationController;


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
/*
Route::middleware('auth:sanctum')->group(function () {
    Route::post('reg',[AdminController::class,'register']);
    Route::post('log',[AdminController::class,'login']);
    Route::post('lgout',[AdminController::class,'logout']);

});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('register',[ClientController::class,'register']);
    Route::post('login',[ClientController::class,'login']);
    Route::post('logout',[ClientController::class,'logout']);

});
*/
Route::resource('cars',CarController::class);
Route::resource('users',UserController::class);
Route::resource('marques',marqueController::class);
Route::resource('typemoteur',typemoteurController::class);
Route::resource('typevoiture',typevoitureController::class);


Route::get('/car-brands', [marqueController::class, 'getCarBrands']);

 Route::post('/register',[ClientController::class,'register']);
 Route::post('/login',[ClientController::class,'login']);
 Route::post('/logout',[ClientController::class,'logout']);
 Route::post('/reg',[AdminController::class,'register']);
 Route::post('/log',[AdminController::class,'login']);
 Route::post('/lgout',[AdminController::class,'logout']);
 

 Route::get('z',[ CarController::class,'dispo']);
Route::get('z2/{id}',[ LocationController::class,'UserId']);
Route::get('{name}',[ CarController::class,'searchbymarque']);
Route::get('zz/{name}',[ CarController::class,'searchbytypemoteur']);
Route::get('z/{name}',[ CarController::class,'searchbytypevoiture']);

