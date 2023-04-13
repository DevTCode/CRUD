<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
   
    public function index()
    {
        $ids = [1, 2, 3, 4,5];
    return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')->join('images', 'cars.image_id', '=', 'images.id')
        ->join('users', 'locations.user_id', '=', 'users.id')
        
        ->select('locations.id','users.nom as nom','users.prenom as prenom','images.chemin as image','locations.dateL as dateL','locations.dateR as dateR','cars.prix as prix' )->whereIn('locations.id', $ids)->orderBy('id')->get();
    }
    public function loc()
    {
        $ids = [4, 5, 6, 7];
    return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')->join('images', 'cars.image_id', '=', 'images.id')
        ->join('users', 'locations.user_id', '=', 'users.id')
        ->select('locations.id','users.nom as nom','users.prenom as prenom','images.chemin as image','locations.dateL as dateL','locations.dateR as dateR','cars.prix as prix' )->whereIn('locations.idLocation', $ids)->orderBy('idLocation')->get();
    }
    public function loca()
    {
       
    return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')
        ->select('locations.id','cars.prix as prix' )->get();
    }
   
    public function lid($i) {
        return DB::table('locations')
        ->join('users', 'users.id', '=', 'locations.user_id')
            ->join('cars', 'cars.id', '=', 'locations.car_id')
            ->join('marques', 'cars.marque_id', '=', 'marques.id')
            ->join('images', 'cars.image_id', '=', 'images.id')
            ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
            ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
          
            ->where('locations.user_id', '=', $i)
            ->select('images.chemin as zineb','marques.libelle as marque', 'typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteur', 'locations.dateL', 'locations.dateR')
            ->get();
    }

    public function cp($i, $ii) {
        return DB::table('locations')
        ->join('cars', 'cars.id', '=', 'locations.car_id')
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
            
            ->where('locations.id', '=', $i)
            ->where('cars.id', '=', $ii)
            ->select(DB::raw('(DATEDIFF(locations.dateR, locations.dateL) + 1) * cars.Prix AS prix_location') ,'locations.id','cars.id','typevoitures.libelle as typevoiture' , 'typemoteurs.libelle as typemoteur' , 'marques.libelle as marque')
            ->get();
    }
    public function idloc($i,$ii,$n,$nn ) {
        return DB::table('locations')
            
            ->where('user_id', '=', $i)
            ->where('car_id', '=', $ii)
            ->where('dateL', '=', $n)
            ->where('dateR', '=', $nn)
            ->select('id')
            ->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'car_id'=>'required',
            'dateL'=>'required',
            'dateR'=>'required',
        ]);
       Location::create($request->post());
        return response()->json([
            'message'=>'location  creer'
        ]);
    }

    public function calcul($id, $id2) {
        return DB::table('locations')
        ->join('cars','locations.car_id','=','cars.id')
        ->where('locations.id', '=', $id)
        ->where('locations.car_id', '=', $id2)
        ->select(DB::raw('(DATEDIFF(locations.dateR, locations.dateL) + 1) * cars.Prix AS total') )
        ->get();
            
    }
    public function show(){
        
        return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')->join('images', 'cars.image_id', '=', 'images.id')
        ->join('users', 'locations.user_id', '=', 'users.id')
        
        ->select('locations.id','users.nom as nom','users.prenom as prenom','images.chemin as image','locations.dateL as dateL','locations.dateR as dateR','cars.prix as prix' )->where('id','=',$id)->get();
    }

  
    public function update (Request $request, $id){
        $location = Location:: find($id);
        $location->update($request->all());
        return $location;
        
    }

    public function destroy(Location $location)
    {
      $location->delete();
      return response()->json([
        'message'=>'loc supp'
      ]);
    }
    public function search ($id)
{
return Location::where('id', 'like','%' .$id. '%')->get();

}
 public   function  UserId ($id)
{
        $luid = Location::s1($id);
        return    $luid;
    
}
public function lc($id)
    {
        return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')
        ->select('locations.car_id')->where('locations.id','=',$id)->get();
    }
}
