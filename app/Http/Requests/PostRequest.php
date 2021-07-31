<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
         return [
             "title"=>"required|unique:posts",      
             "desc"=>"required",
            "content"=>"required",
            "image"=>"required|image",
            "CategoryId"=>"required"
        ];
    }
}
