<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::select('id','image_id','typemoteur_id','typevoiture_id','marque_id','Prix','disponibilite','numero_chassis')->get();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'image_id'=>'required',
            'typemoteur_id'=>'required',
            'typevoiture_id'=>'required',
            'marque_id'=>'required',
            'Prix'=>'required',
            'disponibilite'=>'required',
            'numero_chassis'=>'required'

        ]);
        Car::create($request->post());
        return response()->json([
            'message'=>'Car created successfuly'
        ]);
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'image_id'=>'required',
            'typemoteur_id'=>'required',
            'typevoiture_id'=>'required',
            'marque_id'=>'required',
            'Prix'=>'required',
            'disponibilite'=>'required',
            'numero_chassis'=>'required'

        ]);
        $car->fill($request->post())->update();
        return response()->json([
            'message'=>'Car updated successfuly'
        ]);
    }
    
     
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json([
            'message'=>'Car deleted successfuly'
        ]);
    }
    public function dispo() {
        $cars = DB::table('cars')
            
            ->join('marques', 'cars.marque_id', '=', 'marques.id')
            ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
            ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
            ->join('images', 'cars.image_id', '=', 'images.id')
            ->where('disponibilite', 1)
             ->select('cars.id','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteurs ' , 'marques.libelle as marque','images.chemin as image ')
             ->get();
        
        return $cars;
    }
  public function searchbymarque($name){
   return  DB::table('cars')
    ->join('marques', 'cars.marque_id', '=', 'marques.id')
    ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
    ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
    ->join('images', 'cars.image_id', '=', 'images.id')
    ->where('marques.libelle', '=', $name)
    ->select('cars.id','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteurs ' , 'marques.libelle as marque','images.chemin as image ')
    ->get();
  }
  public function searchbytypemoteur($name){
    return  DB::table('cars')
    ->join('marques', 'cars.marque_id', '=', 'marques.id')
    ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
    ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
    ->join('images', 'cars.image_id', '=', 'images.id')
     ->where('typemoteurs.libelle', '=', $name)
     ->select('cars.id','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteurs ' , 'marques.libelle as marque','images.chemin as image ')
     ->get();
   }
    
   public function searchbytypevoiture($name){
    return  DB::table('cars')
    ->join('marques', 'cars.marque_id', '=', 'marques.id')
    ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
    ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
    ->join('images', 'cars.image_id', '=', 'images.id')
     ->where('typevoitures.libelle', '=', $name)
     ->select('cars.id','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteurs ' , 'marques.libelle as marque','images.chemin as image ')
     ->get();
   }
   public function searchbyidadmin($id){
    return  DB::table('cars')
    ->where('id', $id)
    ->get();

   }
    
        
}
