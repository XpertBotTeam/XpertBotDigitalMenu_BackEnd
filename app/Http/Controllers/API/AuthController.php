<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!is_null($user)) {
            return response()->json(['error' => 'Email already registered'], 400);
        }

        $validator = Validator::make($request->all(), [

            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'phoneNb' => 'required|string|min:6',
            'address' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = new User();        
        $user->Fname = $request->input('Fname');
        $user->LName = $request->input('Lname');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phoneNb = $request->input('phoneNb');
        $user->address = $request->input('address');
        $user->save();
        

        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'status'=>true,
            'messsage'=>'User Created Successfully',
            'token'=>$token
        ]);

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
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            $user = Auth::user();
            
            // Return token and user info
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status'=>true,
                'user' => $user,
                'token' => $token,
                'message'=>'User Logged in Successfully',
            ]);
        }
        else 
        {
            return response()->json([
                'status'=>false,
                'message'=>'Wrong Email or password ',
            ]);
        }
    }
}
