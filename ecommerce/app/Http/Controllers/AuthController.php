<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Mails\register;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if (! $token = auth()->guard('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized']);
        }

       // return $this->createNewToken($token);
        return response()->json(['access_token' =>$token, 'email' => $request->email]);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        
           
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson());
        }
       else
       {
        $user=User::insert([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
           'status'=>$request->status ?? 1,
        'roleid'=>$request->roleid??5,
        ]);
        Mail::to($request->email)->send(new register($request->all()));
    
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ]);
    }
}
    


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->guard('api')->logout();
        

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->guard('api')->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->guard('api')->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
            'user' => auth()->guard('api')->user()
        ]);
    }
    public function updateprofile(Request $req)
    {
        $input = $req->all();
        $userid = Auth::guard('api')->user()->id;
       $val=$req->validate([
        'firstname'=>'required',
        'email'=>'required',
        'lastname'=>'required'
      ]);
      if($val)
      {
        User::where('id', $userid)->update([
            'firstname'=>$req->firstname,
            'lastname'=>$req->lastname,
            'email'=>$req->email,
        ]);
        return response()->json(['msg'=>'profile updated successfully']);
      }
    }

}
