<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Author;
use App\Models\Role;
use App\Models\Quote;
use App\Models\Category;

class Helpers
{

       //create user Token
    public static function newUserToken($user, $type){
        $tokenResult = $user->createToken($type)->accessToken;
        return $tokenResult;
    }


    //create new user with appropriate information
    public static function newUser(Request $request){
        $user = User::create([
                'name' => $request->name,
                'email'=> $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 1
            ]);

        return $user;
    }


    //store uploaded images
    public static function uploadImage(Request $request){
        $path = Storage::putFile('public', $request->file('avatar')); 
        // $request->file('avatar')->storeAs('public',$request->avatar);
        // Store the record, using the new file hashname which will be it's new filename identity.
        // return $request->avatar->hashname();
        return $path;
    }


    //create new user Role
    public static function newRole($role){
        $role = Role::create([
            'role_name' => $role,
        ]);

        return $role;
    }

    //create new author
    public static function newAuthor(Request $request){
        $author = Author::create([
            'author_name' => $request->author_name
        ]);

        return $author;
    }

    //create new category
    public static function newQuote(Request $request){
        $quote = Quote::create([
            'author_id'         => $request->author_id,
            'category_id'       => $request->category_id,
            'content'           => $request->content,
            'scheduled_date'    => $request->scheduled_date
        ]);

        return $quote;
    }

    //create new category
    public static function newCategory(Request $request){
        //process image
        if($request->hasFile('avatar')){
             $avatar = Helpers::uploadImage($request);
        }else{
            $avatar = 'no_image.jpg';
        }
       
        //store category
        $category = Category::create([
            'category_name' => $request->category_name,
            'avatar'    => $avatar
        ]);

        return $category;
    }

    //response formatting
    public static function successResponse(){
        return response()->json([
            'message'   => 'Success'
        ],200);
    }

    //response with message 
    public static function messageResponse($message){
        return response()->json([
            'message' => $message
        ], 200);
    }

    //json response with data
    public static function dataResponse($data, $response_code){
        return response()->json([
            'status'    => 'success',
            'data'      => $data
        ], $response_code);
    }

    //throw error message
    public static function throwError($e){
        throw $e;
    }

    //search helper 
    public static function search($search_val, $column_name, $model_name){
        if($model_name == 'category'){
            $data = Category::latest()
                        ->where($column_name, 'LIKE', $search_val.'%')
                        ->paginate(20);
            return $data;
        }

        if($model_name == 'author'){
            $data = Author::with('quotes')
                        ->latest()
                        ->where($column_name, 'LIKE', $search_val.'%')
                        ->paginate(40);
            return $data;
        }

        if($model_name == 'quote'){
            $data = Quote::with('authors')
                        ->latest()
                        ->where($column_name, 'LIKE', '%'.$search_val.'%')
                        ->paginate(40);
            return $data;
        }

        return Helpers::throwError($e);
        
    }

    //check if the data is empty
    public static function checkIfEmpty($data){
        if(empty($data) || sizeof(explode(' ', $data)) == 0  || is_null($data)){
            return response()->json(['message'=> 'No data found']);
        }
        return true;
    }


}
