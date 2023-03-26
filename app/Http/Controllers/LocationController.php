<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        return Location::select(	'idLocation',' 	user_id	','car_id','	dateL',  '	dateR')->get();

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
