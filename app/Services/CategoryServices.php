<?php

namespace App\Services;

use App\Http\Requests\SearchRequest;

use App\Models\Category;
use App\Helpers;

class CategoryServices extends ImageUploadService
{

    // private $category_name;
    // private $avatar;

    // //set category name
    // public function setCategoryName($category_name){
    //     $this->category_name = $category_name;
    // }

    // //set avatar
    // public function setAvatarName($avatar){
    //     $this->avatar = $avatar;
    // }

    //return all categories
    public function allCategories()
    {
        $categories = Category::latest()->paginate(40);
        return  $categories;
    }

    public function search($search_val)
    {
        $data = Category::latest()
                    ->where('category_name', 'LIKE', '%'.$search_val.'%')
                    ->paginate(20);

         //check if empty
         if(Helpers::checkIfEmpty($data) != false){
            return Helpers::checkIfEmpty($data);
        }
        
        return $data;
    }


    public function create($category_name, $avatar){
        //process image
        if(Helpers::checkIfEmpty($avatar) == true){
            $avatar = 'no_image.jpg';
        }
       //store category
       $category = Category::firstOrCreate([
           'category_name' => $category_name,
           'avatar'    => $avatar
       ]);

       return $category;
    }    

    public function update($category_id, $category_name, $avatar)
    {
        
    }

}