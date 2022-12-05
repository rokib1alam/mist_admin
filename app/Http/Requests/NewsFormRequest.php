<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
            'class_id' => [
                'required',
                'integer'
            ],
            'date' => [
                'required',
                'string',
                'max:255'
            ],
            'notice_title' => [
                'required',
                'string',
                'max:255'
            ],
            'title' => [
                'required',
                'string'
                
            ],
            'attach_document' => [
                'nullable',   
                'mimes:pdf'
            ],
        
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'status' => [
                'nullable'
            ]
        ];
    }
}
