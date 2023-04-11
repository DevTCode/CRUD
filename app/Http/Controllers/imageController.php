<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class imageController extends Controller
{
    public function searchbypic($path){
        return  DB::table('images')
        ->where('chemin', '=', $path)
         ->select('images.id')
         ->get();
         
       }
       public function getImage($path)
       {
           return response()->file(public_path('storage/images/'.$path));
       }
    public function index()
    {
        return Image::select('id','chemin')->get();
        
          
}
public function getPicBrands()
{
    $pi = Image::orderBy('chemin', 'asc')->get(['chemin']);

    return $pi;
   
}
public function addCar(){
    return  DB::table('images')
    ->select('images.id','images.chemin as path')->get();
}
public function show(){
    $ids = [1, 2, 3, 4, 5];
    return  DB::table('images')
    ->select('images.id','images.chemin as path')->whereIn('images.id', $ids)->get();
}
public function pic4(){
    $ids = [15, 16, 17, 18, 19];
    return  DB::table('images')
    ->select('images.id','images.chemin as path')->whereIn('images.id', $ids)->get();
}
public function sh(){
    $ids = [5, 6, 7, 8, 9];
    return  DB::table('images')
    ->select('images.id','images.chemin as path')->whereIn('images.id', $ids)->get();
}
public function sho(){
    $ids = [10, 11, 12, 13, 14];
    return  DB::table('images')
    ->select('images.id','images.chemin as path')->whereIn('images.id', $ids)->get();
}
    
    public function store(Request $request){
        
       $image=$request->file('image');
       $ext = $image->extension();
      
       $file = time().'.'.$ext;
       $image->storeAs('public/images',$file);
       Image::create([
          
           'chemin' => $file,
       ]);
       
    }
    public function storage(Request $request){
        
        return DB::table('images')
        ->select('images.chemin as path')->get();
        
     }

    public function update(Request $request,$id){
        $pic = Image::find($id);
        if($request->hasFile('image'))
        {
            $destination = 'storage/images/'.$pic->chemin;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/',$filename);
            $pic->chemin = $filename;
        }
            $pic->update();
        }
        
    
   

    function destroy($id){
        Image::findorFail($id)->delete();
        
        
}

}
