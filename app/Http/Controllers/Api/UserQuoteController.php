<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QuoteFormRequest;
use App\Http\Requests\SearchRequest;
use App\Helpers;
use App\Models\Quote;

class UserQuoteController extends Controller
{
        //show all quotes 
    public function allQuotes(){
        $quotes = Quote::with('authors', 'categories')
                    ->latest()->paginate(40);
        return Helpers::dataResponse($quotes, 200);
    }


     //find quote by id 
    public function findQuote(SearchRequest $request){
        try{
            $validated = $request->validated();
            $quote = Helpers::search($request->search_val, 'content', 'quote');
            return Helpers::dataResponse($quote, 200); 
        }catch(\Throwable $th){
            Helpers::throwError($th);
        }
        
    }
}
