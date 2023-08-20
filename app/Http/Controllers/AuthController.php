<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        dd($request->all());

        $user = User::where('email',$request->email)->first();
        if(is_null($user))
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }
    
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status'=>true,
                'messsage'=>'User Created Successfully',
                'token'=>$token
            ])
        }
        
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken; // Incorrect for Sanctum
    
            // Return token and user info
            return response()->json([
                'status'=>true,
                'user' => $user,
                'token' => $token,
                'message'=>'User Logged in Successfully',
            ]);
            }
        else {
            return response()->json([
                'status'=>false,
                'message'=>'Wrong Username or password ',
            ]);
        }
    }
}
