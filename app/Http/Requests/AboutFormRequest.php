<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string'
                
            ],
        
            'shortdes' => [
                'required',
                'string',
                
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'img_class' => [
                'required',
                'string',
                'max:255'
            ],
            'text_class' => [
                'required',
                'string',
                'max:255'
            ],
            'status' => [
                'nullable'
            ]
        ];
    }
}
