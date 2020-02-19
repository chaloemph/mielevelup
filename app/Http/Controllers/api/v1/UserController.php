<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;


class UserController extends Controller
{
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 

        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);


        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                // Auth::user()->createToken('authToken')->accessToken;
                $success['accessToken'] =  $user->createToken('authToken')-> accessToken; 
                $success['name'] =  $user->name;
        return response()->json(['success'=>$success], 200); 
    }


    public function index() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], 200); 
    } 

    
    public function show(int $id=null)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function update(Request $request , int $id=null)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->save();
        return response()->json($user, 200);
        
    }



    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();
        return response()->json($product, 200);
        
    }
}
