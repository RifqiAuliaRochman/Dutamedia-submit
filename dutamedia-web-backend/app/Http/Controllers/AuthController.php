<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function index(){
        $users = User::all();
        return send_response('Success', $users);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:4",
            "email"=> "required|email|unique:users",
            "password"=> "required|min:6",
        ]);

        if ($validator->fails()) 

        return send_error('Validation error', $validator->errors(), 422);

            try {
                $user = User::create([
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password'=> Hash::make($request->password),
                ]);

                $data = [
                    'name'=> $user->name,
                    'email'=> $user->email,
                ];

                return send_response('User Registration success', $data);

            } catch (Exception $e) {
                return send_error($e->getMessage(), $e->getCode());
            }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email"=> "required|email",
            "password"=> "required",
        ]);

        if ($validator->fails()) 
        return send_error('Validation error', $validator->errors(), 422);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $data['name'] = $user->name;
            $data['access_token'] = $user->createToken('accessToken')->accessToken;

            return send_response('You are success to log in', $data);
        } else {
            return send_error('unauthorized', '',401);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
    public function show($id)
    {
        $user = User::find($id);

        if($user)
        return send_response('succes', $user);
        else
            return send_error('Data not found');
    }
}
