<?php

namespace App\Http\Requests\CommentsPost;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'post_id' =>'required',
            'comment_id' =>'required',
            'child1_comment_id' =>'',
            'child2_comment_id' =>'',
            'child3_comment_id' =>'',
        ];
    }

    public function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json([ 
            'success'   => false, 
            'message'   => 'Validation errors', 
            'data'      => $validator->errors() 
        ],400)); 
    }
}
