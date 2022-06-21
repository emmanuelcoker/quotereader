<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewAuthorRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Author;
use App\Helpers;

class UserAuthorController extends Controller
{
    //show all authors
    public function allAuthors(){
        $authors = Author::with('quotes')->latest()->paginate(40);
        return Helpers::dataResponse($authors, 200);
    }


    //show author profile
    public function findAuthor(SearchRequest $request){
        try{
            $validated = $request->validated();
            $author = Helpers::search($request->search_val, 'author_name', 'author');
            //search_val, column_name, table_name
            return Helpers::dataResponse($author, 200); 
        }catch(\Throwable $th){
            Helpers::throwError($th);
        }
        
    }

}
