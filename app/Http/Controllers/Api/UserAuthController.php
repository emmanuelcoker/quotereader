<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Helpers;

class UserAuthController extends Controller
{
       public function register(RegistrationRequest $request){
        try{
                //form validation
                $validated = $request->validated();
                //create new user
                $helper = new Helpers;
                $user = $helper->newUser($request);
                //create and save token
                $tokenResult = $helper->newUserToken($user, 'Personal Access Token');

                //format response  
                $response = $helper->dataResponse($tokenResult, 200);
                return $response;
        }catch(\Throwable $e){
            return Helpers::throwError($e);
        }
        
    }


    //login method
    public function login(LoginRequest $request){
        try{
            //validate requests
            $validated = $request->validated();

                if( auth()->attempt($request->all()) ){
                        $token = Helpers::newUserToken(auth()->user(), 'Personal Access Token');
                        return Helpers::dataResponse($token, 200);
                }
        }catch(\Throwable $e){
            return Helpers::throwError($e);
        }

     }

     public function logout(){
        try {
            if(Auth::check()){
                $user = Auth::user()->token();
                $user->revoke();
                return response()->json([
                    'message' => 'Logged Successfully!'
                ]);
            }
        } catch (\Throwable $e) {
            return Helpers::throwError($e);
        }
       
     }
}
