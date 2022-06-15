<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Validator;

use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\ApiLoginRequest;

class AuthController extends BaseController
{
    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function register(ApiRegisterRequest $request)
    {
        // check inputs fields through ApiRegisterRequest
        $registerData = $request->validated();
        // if all registerData aren't empty & right type..., so fill new user with that data
        $user = User::create([
            'name' => $registerData['name'],
            'email' => $registerData['email'],
            'password' => Hash::make($registerData['password'])
        ]);
        $success['access_token'] =  $user->createToken('authToken')->accessToken;
        $success['name'] =  $user->name;
        return $this->sendResponse($success, 'User register successfully.');
    }
 
    /**
    * Login api
    *
    * @return \Illuminate\Http\Response
    */
    public function login(ApiLoginRequest $request)
    {
        // check inputs fields through ApiLoginRequest
        $loginData = $request->validated();

        $inputs = [ 
            'email' => $loginData['email'],
            'password' => $loginData['password'],
            ];

        // "attempt()" method accepts an array of key/value pairs as its first argument. 
        // The values in the array will be used to find the user in your database table. 
        // This method will return true if authentication was successful. Otherwise, false will be returned.

        if ( Auth::attempt($inputs) ) { 
            $user = Auth::user(); 
            $success['access_token'] =  $user->createToken('authToken')-> accessToken; 
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}
