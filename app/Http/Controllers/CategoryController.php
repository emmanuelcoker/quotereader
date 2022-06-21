<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SearchRequest;
use App\Services\CategoryServices;
use App\Services\ImageUploadService;

class CategoryController extends Controller
{

    //get all categories
    public function allCategories(CategoryServices $categoryServices){
        try {
                $categories = $categoryServices->allCategories();

                return view('admin.category.categories')->with([
                    'categories' => $categories
                ]);

            } catch (\Exception $th) {
                return Helpers::throwError($th);
        }
    }

    //store new Category
    public function store(CategoryFormRequest $request, CategoryServices $categoryServices){
        try {
                //validate form requests
                $validated = $request->validated();

                if($request->hasFile('avatar')){
                    $avatar = $categoryServices->uploadImage($avatar);
                }

                //create new category
                $newCategory = $categoryServices->create($request->category_name, $request->avatar);
                return Helpers::dataResponse($newCategory, 201);

            } catch (\Throwable $th) {
                return Helpers::throwError($th);
            }
    }


  
     //store new Quote
     public function update(CategoryFormRequest $request, $id){

        try {
            //validate form requests
            $validated = $request->validated();
            $category = Category::findOrFail($id);
            //update category
           //with images
            
            $category->update($request->validated());

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
           return Helpers::throwError($th);
        }
    }
    

}
