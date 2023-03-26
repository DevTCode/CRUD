<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marque;

class marqueController extends Controller
{
    public function index()
    {
        return Marque::select('id','libelle')->get();
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
    
     
    public function destroy(Marque $Marque)
    {
        $Marque->delete();
        return response()->json([
            'message'=>'Marque deleted successfuly'
        ]);
    }
    public function getCarBrands()
{
    $ma = Marque::orderBy('libelle', 'asc')->get(['id', 'libelle']);

    return $ma;
}
}
