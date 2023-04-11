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
    public function index()
    {
        return  DB::table('factures')
        ->join('cars', 'factures.prix', '=', 'cars.prix')
        ->select('factures.id','cars.prix as prix' )->get();
    }
    public function cp($i, $ii) {
        return DB::table('factures')
        ->join('cars', 'cars.prix', '=', 'factures.price')
        ->join('locations','locations.idLocation','=','factures.idloc')
        ->where('locations.user_id', '=', $i)
        ->where('locations.car_id', '=', $ii)
        ->select(DB::raw('(DATEDIFF(locations.dateR, locations.dateL) + 1) * cars.Prix AS total') )
        ->get();
            
    }

    public function store(Request $request)
    {
        $request->validate([
            
            
            'total'=>'required',
            

        ]);
        Facture::create($request->post());
        return response()->json([
            'message'=>'Facture created successfuly'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
