<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Helpers;

class UserController extends Controller
{
    //get all users
    public function users(){
        return response()->json([
            'data' => User::all()
        ]);
    }

    //find user 
    public function show(User $user){
        return Helpers::dataResponse($user, 200);
    }

    //update user profile
    public function update(RegistrationRequest $request, $id){

        try {
            //validate form requests
            $validated = $request->validated();
            $user = User::findOrFail($id);
          
            $user->update($request->all());

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
