<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
                    'author' => 'required',
                    'publish_at' => 'required',
                    'category_id'=>'required',
                    'num_of_page' => 'required',
                    'quantity' => 'required',
                    'price' => 'required',
                ];
            }
            case 'PUT':{
                return [
                    //
                    'title' => 'required',
                    'author' => 'required',
                    'publish_at' => 'required',
                    'num_of_page' => 'required',
                    'quantity' => 'required',
                    'price' => 'required',
                ];
            }
        }
    }

    
    public function messages(){
        return [
            'title.required' => __('message.title_is_not_null'),
            'author.required' => __('message.author_is_not_null'),
            'publish_at.required'=>__('message.publish_at_is_not_null'),
            'category_id[].required'=>__('message.category_is_not_null'),
            'num_of_page.required'=>__('message.num_of_page_is_not_null'),
            'quantity.required'=>__('message.quantity_is_not_null'),
            'price.required'=>__('message.price_is_not_null'),
        ];
    }
}
