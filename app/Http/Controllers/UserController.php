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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'CNE' => 'required',
            'tel' => 'required',
            'numPermis' => 'required',
            'email' => 'required',
        ]);
    
        // Utilisez find() pour obtenir le modèle existant ou null si non trouvé
        $user = User::find($id);
    
        if ($user) {
            // Mettez à jour les attributs du modèle avec les données du formulaire
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->CNE = $request->input('CNE');
            $user->tel = $request->input('tel');
            $user->numPermis = $request->input('numPermis');
            $user->email = $request->input('email');
            $user->save(); // Sauvegardez les modifications dans la base de données
    
            return response()->json([
                'message' => 'Utilisateur mis à jour avec succès',
                 
            ]);
        } else {
            // Gérez le cas où le modèle n'est pas trouvé
            return response()->json([
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }
    }
    public function show($id){
        
        return  DB::table('users')
        ->where('id','=',$id)
        ->select('nom','prenom','CNE','tel','numPermis','email')->get();
    }
     
      
    public function destroy(Marque $Marque)
    {
       
    }
  
}
