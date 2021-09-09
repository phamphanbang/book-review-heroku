<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'title' => 'required',
                    'description' => 'required',
                ];
            }
            case 'PUT':{
                return [
                    //
                    'title' => 'required',
                    'description' => 'required',
                ];
            }
        }
    }

    public function messages(){
        return [
            'title.required' => __('message.title_is_not_null'),
            'description.required' => __('message.description_is_not_null'),
        ];
    }
}
