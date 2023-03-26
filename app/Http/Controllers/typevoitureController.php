<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typevoiture;

class typevoitureController extends Controller
{
    public function index()
    {
        return Typevoiture::select('id','libelle')->get();
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
}
