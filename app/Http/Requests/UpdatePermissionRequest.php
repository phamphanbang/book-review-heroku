<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()) {
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
            'name' => ['required','unique:permissions,name,'.$this->old_name.',name','string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'required' => __('message.required',['attribute' => ':attribute']),
            'unique' => __('message.unique' , ['attribute' => ':attribute']),
        ];
    }
}
