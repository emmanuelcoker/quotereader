<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Pagination\Pagination;
use App\Http\Requests\NewAuthorRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Author;
use App\Helpers;

class AuthorController extends Controller
{
    //show all authors for admin table
    public function allAuthors(){
        $authors = Author::withCount('quotes')->oldest()->simplePaginate(10);
        return view('admin.authors.authors')->with([
            'authors' => $authors
        ]);

    }

      //create new author
      public function create(NewAuthorRequest $request){
        try {
            $validated = $request->validated();
            $newAuthor = Helpers::newAuthor($request);

            $response = Helpers::dataResponse($newAuthor, 201);
            return $response;
        } catch (\Throwable $th) {
            return Helpers::throwError($th);
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


    public function delete($id){
        $author = Author::findOrFail($id);
        $author->delete();
        return Helpers::messageResponse('Author Deleted Successfully!');
    }
}
