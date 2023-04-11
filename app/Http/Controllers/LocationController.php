<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
   
    public function index()
    {
        $ids = [1, 2, 3, 4];
    return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')
        ->join('users', 'locations.user_id', '=', 'users.id')
        ->select('locations.idLocation','users.nom as nom','users.prenom as prenom','locations.dateL as dateL','locations.dateR as dateR','cars.prix as prix' )->whereIn('locations.idLocation', $ids)->orderBy('idLocation')->get();
    }
    public function loc()
    {
        $ids = [4, 5, 6, 7];
    return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')
        ->join('users', 'locations.user_id', '=', 'users.id')
        ->select('locations.idLocation','users.nom as nom','users.prenom as prenom','locations.dateL as dateL','locations.dateR as dateR','cars.prix as prix' )->whereIn('locations.idLocation', $ids)->orderBy('idLocation')->get();
    }
    public function loca()
    {
       
    return  DB::table('locations')
        ->join('cars', 'locations.car_id', '=', 'cars.id')
        ->select('locations.idLocation','cars.prix as prix' )->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'idLocation'=>'required',
            'user_id	 '=>'required',
            'car_id	 '=>'required',
            'dateL '=>'required',
            '	dateR '=>'required',
        ]) ;
       Location::create($request->post());
        return response()->json([
            'message'=>'location  creer'
        ]);
    }

 
    public function show(Location $location)
    {
        return response()->json([
            'location'=>$location
        ]);
       
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
return Location::where('idLocation', 'like','%' .$id. '%')->get();

}
 public   function  UserId ($id)
{
        $luid = Location::s1($id);
        return    $luid;
    
}
}
