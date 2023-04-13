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
use App\Http\Controllers\factureController;


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
//Route::resource('users',UserController::class);
Route::resource('idelete',imageController::class);
Route::resource('marques',marqueController::class);
Route::resource('typemoteur',typemoteurController::class);
Route::resource('typevoiture',typevoitureController::class);
Route::resource('clients',UserController::class);
Route::get('factures',[factureController::class,'index']);
Route::resource('locations',locationController::class);
//Route::get('sh/{id}',[locationController::class],'show');
//Route::resource('factures',factureController::class);
//Route::resource('ima',imageController::class);
Route::get('lc/{id}',[locationController::class],'lc');
Route::get('lm',[ marqueController::class,'lm']);
Route::get('ltv',[ typevoitureController::class,'index2']);
Route::get('ltm',[ typemoteurController::class,'index4']);
Route::get('all/{name}/{name2}/{name3}',[  CarController::class,'searchbyall']);
Route::get('mtv/{name}/{name2} ',[  CarController::class,'searchbymtv']);
 Route::get('mtm/{name}/{name2} ',[  CarController::class,'searchbymtm']);
 Route::get('tvtm/{name}/{name2} ',[  CarController::class,'searchbytvtm']);
Route::post('upload', [imageController::class,'store']);
Route::put('edituser/{id}',[userController::class,'update']);
Route::get('allPic', [imageController::class,'show']);
Route::get('loc', [locationController::class,'loc']);
Route::get('calcul/{id}/{id2}',[locationController::class,'calcul']);
Route::get('lc/{id}',[locationController::class,'lc']);
Route::get('loca/{id}', [factureController::class,'loca']);
Route::get('tv', [typevoitureController::class,'tv']);
Route::get('allIm', [imageController::class,'sh']);
Route::get('allIs', [imageController::class,'sho']);
Route::get('pic4', [imageController::class,'pic4']);
Route::get('m2', [marqueController::class,'m2']);
Route::get('AddCar', [imageController::class,'AddCar']);
Route::post('ima/{id}',[imageController::class,'update']);
Route::post('images',[imageController::class,'getPicBrands']);

Route::get('/car-brands', [marqueController::class, 'getCarBrands']);
Route::get('/pb', [imageController::class, 'getPicBrands']);
Route::get('/gi/{path}', [imageController::class, 'getImage']);
Route::get('/store-image', [imageController::class, 'storage']);
Route::get('/type_moteur', [typemoteurController::class, 'getTypemoteur']);
Route::get('/type_voiture', [typevoitureController::class, 'getTypevoiture']);

Route::get('/mar/{id}', [marqueController::class, 'getMarqueLibelle']);
Route::get('/tms/{id}', [typemoteurController::class, 'getTmLibelle']);
Route::get('/tvs/{id}', [typevoitureController::class, 'getTvLibelle']);
Route::get('al',[ CarController::class,'searchbyal']);
Route::get('all',[ CarController::class,'searchbyall2']);
Route::get('allCars',[ CarController::class,'allCars']);
Route::get('c',[ CarController::class,'c']);
Route::post('res',[ factureController::class,'store']);

Route::post('login',[ClientController::class,'login']);
Route::get('logout',[ClientController::class,'logout'])->middleware('auth:sanctum');
Route::get('/usid', [ClientController::class, 'id'])->middleware('auth:sanctum');
Route::post('/reg',[AdminController::class,'register']);
Route::post('register',[ClientController::class,'register']);
Route::get('ic/{id}',[ClientController::class,'ic']);
 Route::post('/log',[AdminController::class,'login']);
 Route::post('/lgout',[AdminController::class,'logout'])->middleware('auth:sanctum');
 Route::get('/api/options', [CarController::class,'cr']);
 Route::get('sm1/{name}',[ marqueController::class,'searchbymarque1']);
 Route::get('pic/{path}',[ imageController::class,'searchbypic']);

 Route::get('stv/{name}',[ typevoitureController::class,'searchbytv']);
 Route::get('stm/{name}',[ typemoteurController::class,'searchbytm']);
 Route::post('z2',[ locationController::class,'store']);

Route::get('lid/{i}',[ locationController::class,'lid']);
Route::put('di/{id}',[CarController::class,'updateCarDispo']);
Route::get('prix/{i}/{ii}',[ locationController::class,'cp']);
Route::get('idloc/{i}/{ii}/{n}/{nn}',[ locationController::class,'idloc']);
 
Route::get('show/{id}',[UserController::class,'show']);
Route::put('edituser/{id}',[UserController::class,'update']);
 
Route::get('f/{i}',[ factureController::class,'index4']);
 Route::get('z',[ CarController::class,'dispo']);

Route::get('{name}',[ CarController::class,'searchbymarque']);
 Route::get('zz/{name}',[ CarController::class,'searchbytypemoteur']);
 Route::get('z/{name}',[ CarController::class,'searchbytypevoiture']);

//Route::get('all',[ CarController::class,'searchbyall2']);




