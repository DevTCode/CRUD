<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  
  
    
    
   
    public function index()
    {
        return DB::table('users')->get();
    }

    public function store(Request $request)
    {
        
    }

    
    public function update(Request $request, User $User)
    {
        $request->validate([
           
            'tel'=>'required',
          
            'email'=>'required',
           

        ]);
        $User->fill($request->post())->update();
        return response()->json([
            'message'=>'User updated successfuly'
        ]);
    }
    public function show(){
        
        return  DB::table('users')
        ->select('tel','email')->get();
    }
     
      
    public function destroy(Marque $Marque)
    {
       
    }
  
}
