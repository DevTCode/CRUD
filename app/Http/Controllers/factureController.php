<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use Illuminate\Support\Facades\DB;

class factureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loca($id)
    {
     
    
        return  DB::table('factures')
      
        ->join('locations', 'locations.id', '=', 'factures.idloc')
        ->join('users', 'users.id', '=', 'locations.user_id')
        ->join('cars', 'cars.id', '=', 'locations.car_id')
      
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
      
      
        ->where('factures.id', '=', $id)
        ->select('factures.id','factures.created_at as time','factures.idloc as idloc','factures.total as total','marques.libelle as marque', 'typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteur', 'locations.dateL', 'locations.dateR')
        ->get();
       
    }
    
    
    
    public function index()
    {
        return  DB::table('factures')
        
        ->select('factures.id as id','factures.idloc as idloc','factures.idcar as idcar','factures.total as total' )->get();
    }
    
        public function store(Request $request)
        {
            $request->validate([
                'idloc'=>'required',
                'idcar'=>'required',
                'total'=>'required',
                
            ]);
           Facture::create($request->post());
            return response()->json([
                'message'=>'facture  creer'
            ]);
        }
    

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        
        return  DB::table('factures')->get();
    }
    public function index4($i)
    {
        return  DB::table('factures')
      
        ->join('locations', 'locations.id', '=', 'factures.idloc')
        ->join('users', 'users.id', '=', 'locations.user_id')
        ->join('cars', 'cars.id', '=', 'locations.car_id')
      
        ->join('marques', 'cars.marque_id', '=', 'marques.id')
        ->join('images', 'cars.image_id', '=', 'images.id')
        ->join('typemoteurs', 'cars.typemoteur_id', '=', 'typemoteurs.id')
        ->join('typevoitures', 'cars.typevoiture_id', '=', 'typevoitures.id')
      
      
        ->where('locations.user_id', '=', $i)
        ->select('factures.id','factures.idloc as idloc','factures.total as total','marques.libelle as marque', 'typevoitures.libelle as typevoiture', 'typemoteurs.libelle as typemoteur', 'locations.dateL', 'locations.dateR')
        ->get();
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
