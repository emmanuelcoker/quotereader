<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newFavouriteNotification;
use App\Models\Favourite;
use App\Models\Quote;
use App\Models\User;
use App\Helpers;


class UserFavouriteController extends Controller
{
      //add quotes to favourites
    public function addFavourite($id){
        try{
            $quote = Quote::findOrFail($id);
            $newFavourite = Favourite::firstOrCreate([
                'user_id'   => auth()->user()->id,
                'quote_id'  => $quote->id
            ]);

            auth()->user()->notify(new newFavouriteNotification($quote));
            return Helpers::dataResponse($newFavourite, 201); 
        }catch(\Throwable  $th){
            return Helpers::throwError($th);
        }
    }

    //get current user favourite quotes
    public function myFavourites(){
         try {
            $favourites = Favourite::latest()
                            ->where('user_id', auth()->user()->id)
                            ->with('quotes')
                            ->paginate(40);
            return Helpers::dataResponse($favourites, 200);
        } catch (\Throwable $th) {
            return Helpers::throwError($th);
        }
    }


    //remove quote from favourites
    public function delete($id){
        try {
            $favourite = Favourite::where('id', $id)
                                    ->where('user_id', auth()->user()->id)
                                    ->first();

            if(Helpers::checkIfEmpty($favourite) !== false){
               return response()->json([
                    'message'   => 'No Data Found'
               ]);
            }

            $favourite->delete(); 
            return Helpers::successResponse();
            
        } catch (\Throwable $th) {
            return Helpers::throwError($th);
        }
    }
}
