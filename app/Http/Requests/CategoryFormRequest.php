<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        if(Auth::user()->role_id == 1){
           return true; 
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name'     =>  'required|string|max:50',
            'avatar'            =>  'mimes:jpg,jpeg,gif,png',
        ];
    }


    public function messages(){
        return [
            'category_name' => 'Please enter a category name!',
            'avatar'        => 'Please select a valid image of jpg, gif or png format'
        ];
    }
}
