<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marque;
use Illuminate\Support\Facades\DB;

class marqueController extends Controller
{
    public function index()
    {
        $ids = [1, 2, 3, 4];
    return  DB::table('marques')
    ->select('marques.id','marques.libelle as libelle')->whereIn('marques.id', $ids)->orderBy('id')->get();
       
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'libelle'=>'required',
            

        ]);
        Marque::create($request->post());
        return response()->json([
            'message'=>'Marque created successfuly'
        ]);
    }

  
    public function update(Request $request, Marque $Marque)
    {
        $request->validate([
            'libelle'=>'required',
           

        ]);
        $Marque->fill($request->post())->update();
        return response()->json([
            'message'=>'Marque updated successfuly'
        ]);
    }
    
    public function show(){
        
        return  DB::table('images')
        ->select('images.id','images.chemin as path')->get();
    }
    public function destroy(Marque $Marque)
    {
        $Marque->delete();
        return response()->json([
            'message'=>'Marque deleted successfuly'
        ]);
    }
    public function getCarBrands()
{
    $ma = Marque::orderBy('libelle', 'asc')->get(['libelle']);

    return $ma;
}
public function searchbymarque1($name){
  
    return  DB::table('marques')
    ->where('libelle', '=', $name)
     ->select('marques.id' )
     ->get();
   }
   public function m2( ){
    $ids = [5, 6, 7, 8];
    return  DB::table('marques')
    ->select('marques.id','marques.libelle as libelle')->whereIn('marques.id', $ids)->orderBy('id')->get();
     
   } 
public function index2()
    {
        return Marque::select('libelle as libelle')->get();

    }
}
