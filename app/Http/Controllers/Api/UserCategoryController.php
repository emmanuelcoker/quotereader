<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers;
use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SearchRequest;
use App\Services\CategoryServices;

class UserCategoryController extends Controller
{
     //get all categories
    public function allcategories(CategoryServices $categoryService){
        try {
                $categories = $categoryService->allCategories();
                return  Helpers::dataResponse($categories, 200);

            } catch (\Throwable $th) {
                return Helpers::throwError($th);
        }
    }

    
    //find category
    public function findCategory(SearchRequest $request, CategoryServices $categoryService){
        try {
            $categoryResult = $categoryService->search($request->search_val);
            
            return Helpers::dataResponse($categoryResult, 200); 
        } catch (\Throwable $th) {
            return Helpers::throwError($th);
        }
               
    }
}
