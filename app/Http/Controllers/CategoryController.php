<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SearchRequest;

class CategoryController extends Controller
{

    //get all categories
    public function allcategories(){
        try {
                $categories = Category::latest()->paginate(40);
                return  Helpers::dataResponse($categories, 200);

            } catch (\Exception $th) {
                Helpers::throwError($th);
        }
    }

    //store new Category
    public function store(CategoryFormRequest $request){
        try {
                //validate form requests
                $validated = $request->validated();

                //create new category
                $newCategory = Helpers::newCategory($request);

                return Helpers::dataResponse($newCategory, 201);

            } catch (\Throwable $th) {
                Helpers::throwError($th);
            }
    }


    //find category
    public function findCategory(SearchRequest $request){
        try {
            $categoryResult = Helpers::search(
            $request['search_val'], //search value
                'category_name', //compared field
                'category' // model name
            );
            
            //check if empty
            if(Helpers::checkIfEmpty($categoryResult)){
                return Helpers::checkIfEmpty($categoryResult);
            }

            return Helpers::dataResponse($categoryResult, 200); 
        } catch (\Throwable $th) {
                Helpers::throwError($th);
        }
               
    }

     //store new Quote
     public function update(CategoryFormRequest $request, $id){

        try {
            //validate form requests
            $validated = $request->validated();
            $category = Category::findOrFail($id);
            //update category
            // if($request->hasFile('avatar') && $category->avatar !== 'no_image.jpg'){
               
            //     Storage::delete($category->avatar);
                
            //     $newAvatar = Helpers::uploadImage($request);

            //     $category->update($request->except('avatar'));
            //     $category->avatar = $newAvatar;
            //     $category->save();
            // }
            
            $category->update($request->all());

            $response = Helpers::dataResponse($category, 200);
            return $response;

        } catch (Exception $e) {
           return Helpers::throwError($th);
        }
    }


    //delete a category
    public function delete($id){
        try{
            $category = Category::findOrFail($id);
            $category->delete();
            return Helpers::successResponse();
        }catch(\Throwable $th){
            Helpers::throwError($th);
        }
    }
    

}
