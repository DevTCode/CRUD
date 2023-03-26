<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typemoteur;

class typemoteurController extends Controller
{
    public function index()
    {
        return Typemoteur::select('id','libelle')->get();
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'libelle'=>'required',
            

        ]);
        Typemoteur::create($request->post());
        return response()->json([
            'message'=>'Typemoteur created successfuly'
        ]);
    }

    public function update(Request $request, Typemoteur $Typemoteur)
    {
        $request->validate([
            'libelle'=>'required',
           

        ]);
        $Typemoteur->fill($request->post())->update();
        return response()->json([
            'message'=>'Typemoteur updated successfuly'
        ]);
    }
    
     
    public function destroy(Typemoteur $Typemoteur)
    {
        $Typemoteur->delete();
        return response()->json([
            'message'=>'Typemoteur deleted successfuly'
        ]);
    }
}
