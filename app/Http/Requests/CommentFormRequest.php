<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
        switch($this->method()){
            case 'POST':{
                return [
                    //
                    'body' => 'required|min:10',
                ];
            }
            case 'PUT':{
                return [
                    //
                    'body' => 'required|min:10',
                ];
            }
        }
    }

    public function messages(){
        return [
            'body.required' => __('message.body_is_not_null'),
            'body.min' => __('message.body_is_min')
        ];
    }
}
