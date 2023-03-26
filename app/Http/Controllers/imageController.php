<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class imageController extends Controller
{
    
    public function index()
    {
        return Image::select('id','chemin')->get();
 
}


    
    public function store(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'chemin'=>'required',
        ]);
    }

    public function update($id,$chemin ){
        $up = Image::find($id);
        $up->chemin = $chemin;
    
        $up->save();
    }

    function destroy($id){
        Image::findorFail($id)->delete();
        
        
}
}
