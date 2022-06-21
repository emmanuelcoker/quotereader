<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class QuoteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if(Auth::user()->role_id == 1){
        //     return true;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author_id'     =>  'required|numeric',
            'category_id'   =>  'required|numeric',
            'content'       =>  'required|string|min:10',
            'scheduled_date' => 'nullable' 
        ];
    }

    public function messages()
    {
        return [
            'author_id'     =>  'Author field is required!',
            'category_id'   =>  'Category field is required!',
            'content'       =>  'Please enter atleast 10 characters!',
            'scheduled_date' => 'Please select a date in the future!' 
        ];
    }
}
