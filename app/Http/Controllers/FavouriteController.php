<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newFavouriteNotification;
use App\Models\Favourite;
use App\Models\Quote;
use App\Models\User;
use App\Helpers;
use DB;

class FavouriteController extends Controller
{

    //get all favourite quotes of all users 
    public function allFavourites(){
        try {       
            
              $favourites = DB::table('favourites')
                    ->select('quote_id',  DB::raw("count(*) as no_of_likes"))
                    ->groupBy('quote_id')
                    ->get();

            return Helpers::dataResponse($favourites, 200);
        } catch (\Throwable $th) {
            return Helpers::throwError($th);
        }
        
    }

}
