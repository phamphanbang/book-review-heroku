<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewFormRequest extends FormRequest
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
                    'body' => 'required',
                    'rate' => 'required',
                ];
            }
            case 'PUT':{
                return [
                    //
                    'title' => 'required',
                    'body' => 'required',
                ];
            }
        }
    }

    public function messages(){
        return [
            'title.required' => __('message.title_is_not_null'),
            'body.required' => __('message.body_is_not_null'),
            'rate.required' => __('message.rate_is_not_null')
        ];
    }
}
