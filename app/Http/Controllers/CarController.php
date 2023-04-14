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
        $cars = Car::select('typevoitures.libelle', 'typemoteurs.libelle', 'marques.libelle','images.chemin','Prix','disponibilite','numero_chassis')->get();
       
    }
    public function searchbyal(){
        $ids = [1, 2, 3, 4];
        return  DB::table('cars')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
        ->select('cars.id','images.chemin as path','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','cars.disponibilite as z'  ,'Prix','numero_chassis' )
        ->whereIn('cars.id', $ids)->orderBy('id')->get();
         
       }
       public function searchbyall2(){
        return  DB::table('cars')
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
        ->select('cars.id','images.chemin as zineb','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','cars.disponibilite as D'  ,'cars.Prix as p','numero_chassis' )
        ->get();
       }
       public function allCars( ){
        $ids = [5, 6, 11, 12];
        return  DB::table('cars')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
        ->select('cars.id','images.chemin as path','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','cars.disponibilite as z'  ,'Prix','numero_chassis' )
        ->whereIn('cars.id', $ids)->orderBy('id')->get();
         
       }
       public function c( ){
        $ids = [13, 14, 15, 16];
        return  DB::table('cars')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
        ->select('cars.id','images.chemin as path','typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','cars.disponibilite as z'  ,'Prix','numero_chassis' )
        ->whereIn('cars.id', $ids)->orderBy('id')->get();
         
       }
    public function store(Request $request)
    {
        $request->validate([
            
            
            'typevoiture_id'=>'required',
            'typemoteur_id'=>'required',
            'image_id'=>'required',
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
            
            'typevoiture_id'=>'required',
            'typemoteur_id'=>'required',
            'marque_id'=>'required',
            'image_id'=>'required',
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
  
    public function searchbymarque($name){
        return  DB::table('cars')
         ->join('marques', 'cars.marque_id', '=', 'marques.id')
         ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
         ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
         ->join('images', 'cars.image_id', '=', 'images.id')
         ->where('marques.libelle', '=', $name)
         ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
         ->get();
       }
       public function searchbytypemoteur($name){
        return  DB::table('cars')
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
         ->where('typemoteurs.libelle', '=', $name)
         ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
                ->get();}
        
       public function searchbytypevoiture($name){
        return  DB::table('cars')
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
         ->where('typevoitures.libelle', '=', $name)
         ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
         ->get();}
   public function dispo() {
    $cars = DB::table('cars')
        
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
        ->where('disponibilite', 'true')
        ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
        ->get();
    
    return $cars;
}
   public function searchbyidadmin($id){
    return  DB::table('cars')
    ->where('id', $id)
    ->get();

   }
   
   public function searchbyall($name,$name2,$name3){
    return  DB::table('cars')
    ->join('marques', 'cars.marque_id', '=', 'marques.id')
    ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
    ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
    ->join('images', 'cars.image_id', '=', 'images.id')
     ->where('typevoitures.libelle', '=', $name2)
     ->where('marques.libelle', '=', $name)
     ->where('typemoteurs.libelle', '=', $name3)
     ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
     ->get();
   }
   public function searchbymtv($name,$name2 ){
    return  DB::table('cars')
    ->join('marques', 'cars.marque_id', '=', 'marques.id')
    ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
    ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
    ->join('images', 'cars.image_id', '=', 'images.id')
     ->where('typevoitures.libelle', '=', $name2)
     ->where('marques.libelle', '=', $name)
     ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
     ->get();
   }
   public function searchbymtm($name,$name2 ){
    return  DB::table('cars')
    ->join('marques', 'cars.marque_id', '=', 'marques.id')
    ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
    ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
    ->join('images', 'cars.image_id', '=', 'images.id')
    ->where('typemoteurs.libelle', '=', $name2)
     ->where('marques.libelle', '=', $name)
     ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
     ->get();
   }
   public function searchbytvtm($name,$name2 ){
    return  DB::table('cars')
    ->join('marques', 'cars.marque_id', '=', 'marques.id')
    ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
    ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
    ->join('images', 'cars.image_id', '=', 'images.id')
    ->where('typemoteurs.libelle', '=', $name2)
    ->where('typevoitures.libelle', '=', $name)
    ->select('cars.id','typevoitures.libelle as typevoiture','cars.disponibilite as D', 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque','images.chemin as zineb' ,'cars.Prix as p' )
    ->get();
   }
   public function updateCarDispo($id)
   {
       // Récupérer la voiture avec l'ID donné
       $car = Car::find($id);
   
       // Vérifier si la voiture existe
       if ($car) {
           // Mettre à jour la colonne 'dispo' à false
           $car->update(['disponibilite' => false]);
   
           // Retourner une réponse de succès
           return response()->json(['message' => 'La disponibilité de la voiture a été mise à jour avec succès.']);
       } else {
           // Retourner une réponse d'erreur si la voiture n'est pas trouvée
           return response()->json(['error' => 'Voiture non trouvée.'], 404);
       }
   } 
   public function disp($id)
   {
       // Récupérer la voiture avec l'ID donné
       $car = Car::find($id);
   
       // Vérifier si la voiture existe
       if ($car) {
           // Mettre à jour la colonne 'dispo' à false
           $car->update(['disponibilite' => true]);
   
           // Retourner une réponse de succès
           return response()->json(['message' => 'La disponibilité de la voiture a été mise à jour avec succès.']);
       } else {
           // Retourner une réponse d'erreur si la voiture n'est pas trouvée
           return response()->json(['error' => 'Voiture non trouvée.'], 404);
       }
   } 
}
