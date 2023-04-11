<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typevoiture;
use Illuminate\Support\Facades\DB;

class typevoitureController extends Controller
{
    public function index()
    {
        $ids = [1, 2, 3, 4];
        return  DB::table('typevoitures')
        ->select('typevoitures.id','typevoitures.libelle as libelle')->whereIn('typevoitures.id', $ids)->get();
      
    }

    public function tv(){
        $ids = [5, 6, 7, 8];
        return  DB::table('typevoitures')
        ->select('typevoitures.id','typevoitures.libelle as libelle')->whereIn('typevoitures.id', $ids)->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'libelle'=>'required',
            

        ]);
        Typevoiture::create($request->post());
        return response()->json([
            'message'=>'Typevoiture created successfuly'
        ]);
    }


  
    public function update(Request $request, Typevoiture $Typevoiture)
    {
        $request->validate([
            'libelle'=>'required',
           

        ]);
        $Typevoiture->fill($request->post())->update();
        return response()->json([
            'message'=>'Typevoiture updated successfuly'
        ]);
    }
    
     
    public function destroy(Typevoiture $Typevoiture)
    {
        $Typevoiture->delete();
        return response()->json([
            'message'=>'Typevoiture deleted successfuly'
        ]);
    }
    public function getTypevoiture()
{
    $ma = Typevoiture::orderBy('libelle', 'asc')->get(['libelle']);

    return $ma;
}
public function searchbytv($name){
    return  DB::table('typevoitures')
    ->where('libelle', '=', $name)
     ->select('typevoitures.id' )
     ->get();
   }
   public function getTvLibelle($id) {
    return  DB::table('typevoitures')
    ->where('id', '=', $id)
     ->select('typevoitures.libelle' )
     ->get();
}
}
