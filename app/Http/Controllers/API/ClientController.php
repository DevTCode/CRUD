<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ClientController extends Controller
{
    public function register(Request $request){
        $fields = Validator::make($request->all(),[
            
            'nom' => 'required',
            'prenom' => 'required',
            'CNE' => 'required',
            'tel' => 'required',
            'numPermis' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            
        ]);

        if($fields->fails()) {
            $response = [
                'success' => false,
                'message' => $fields->errors()
            ];
            return response()->json($response,400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('myApp')->plainTextToken;

        $success['nom'] = $user->nom;
        $success['prenom'] = $user->prenom;
        $success['CNE'] = $user->CNE;
        $success['tel'] = $user->tel;
        $success['numPermis'] = $user->numPermis;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => "register successfuly"
        ];

        return response()->json($response,200);
    }
    public function login (Request $request) {
        try{
            $validate=Validator::make($request->all(),
            [
                'email'=>'required|email',
                'password'=>'required|string'
            ]);
            if($validate->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate->errors()
                ],401);
            }
            
            $user = User::where('email',$request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'user logged In successfuly',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ],200);
        }
            catch(\Throwable $th){
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ],500);
            }
            
        
        }
        public function logout (Request $request) {
            auth()->user()->tokens ()->delete();
            return [
            'message' => 'Logged out'];
        }
}
    
