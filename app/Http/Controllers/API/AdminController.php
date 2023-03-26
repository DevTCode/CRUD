<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
class AdminController extends Controller
{
    public function register(Request $request){
        $fields = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
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
        $admin = Admin::create($input);

        $success['token'] = $admin->createToken('myApp')->plainTextToken;

        $success['name'] = $admin->name;

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
            
            $admin = Admin::where('email',$request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'Admin logged In successfuly',
                'token' => $admin->createToken("API TOKEN")->plainTextToken
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
