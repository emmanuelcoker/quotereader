<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewAuthorRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Author;
use App\Helpers;

class AuthorController extends Controller
{
    //show all authors
    public function allAuthors(){
        $authors = Author::with('quotes')->latest()->paginate(40);
        return Helpers::dataResponse($authors, 200);
    }

    //create new author
    public function create(NewAuthorRequest $request){
        try {
            $validated = $request->validated();
            $newAuthor = Helpers::newAuthor($request);

            $response = Helpers::dataResponse($newAuthor, 201);
            return $response;
        } catch (\Throwable $th) {
            Helpers::throwError($th);
        }
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

    //update author profile
    public function update(NewAuthorRequest $request, $id){

        try {
            //validate form requests
            $validated = $request->validated();
            $author = Author::findOrFail($id);
          
            $author->update($request->all());

            return Helpers::dataResponse($author, 200);

        } catch (\Throwable $th) {
            Helpers::throwError($th);
        }
    }
}
