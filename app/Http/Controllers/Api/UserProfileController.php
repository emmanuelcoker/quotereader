<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Helpers;

class UserProfileController extends Controller
{
 
    //update user profile
    public function update(RegistrationRequest $request){

        try {
            //validate form requests
            $validated = $request->validated();
            $user = User::findOrFail(auth()->user()->id);
          
            $user->update(['name' => $validated['name'], 'password' => $validated['password']]);

            $response = Helpers::dataResponse($user, 200);
            return $response;

        } catch (\Throwable $th) {
            return Helpers::throwError($th);
        }
    }
 

    //subscribe to receive emails 
    public function subscribe(){
        try {
            $user = User::findOrFail(auth()->user()->id);
            if(!$user->isSubscribed){
                $user->isSubscribed = true;
                $user->save();
            }

            return Helpers::messageResponse('You have subscribed successfully to receive Quotes Daily!'); 

        } catch (\Throwable $e) {
            return Helpers::throwError($e);
        }
    }  


    //unsubscribe from emails
    public function unsubscribe(){
         $user = User::findOrFail(auth()->user()->id);
            if($user->isSubscribed){
                $user->isSubscribed = false;
                $user->save();
            }

            return Helpers::messageResponse('You have unsubscribed successfully to receive Quotes Daily!'); 
    }
}
