<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuoteFormRequest;
use App\Http\Requests\SearchRequest;
use App\Helpers;
use App\Models\Quote;

class QuoteController extends Controller
{

    //show all quotes for admin page
    public function allQuotes(){
        $quotes = Quote::with('authors', 'categories')
                    ->latest()
                    ->paginate(40);

        //return Helpers::dataResponse($quotes, 200);
        return view('admin.quotes.quotes')->with([
            'quotes' => $quotes,
        ]);
    }


    //store new Quote
    public function create(QuoteFormRequest $request){

        try {
            //validate form requests
            $validated = $request->validated();

            //create new quote
            $newQuote = Helpers::newQuote($request);
            
            return Helpers::dataResponse($newQuote, 201);

        } catch (\Throwable $th) {
           return Helpers::throwError($th);
        }
    }
    


    //update quote
    public function update(QuoteFormRequest $request, $id){

        try {
            //validate form requests
            $validated = $request->validated();
            $quote = Quote::findOrFail($id);
          
            $quote->update($request->all());
            return Helpers::dataResponse($quote, 200);

        } catch (\Throwable $th) {
            return Helpers::throwError($th);
        }
    }


    //delete a quote
    public function delete($id){
        try{
            $quote = Quote::findOrFail($id);
            $quote->delete();
            return Helpers::successResponse();
        }catch(\Throwable $th){
            return Helpers::throwError($th);
        }
    }
    
}
