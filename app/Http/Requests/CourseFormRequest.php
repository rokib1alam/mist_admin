<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
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
            'department' => [
                'required',
                'string',
                'max:255'
            ],
            'Depthead' => [
                'required',
                'string'
            ],
            'hour' => [
                'required',
                'string'
            ],
            'shortdesc' => [
                'required',
                'string',
                'max:800'
            ],
        
            'description' => [
                'required',
                'string',
                'max:800'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'admissionfee' => [
                'required',
                'string'
            ],
            'semesterfee' => [
                'required',
                'string'
            ],
            'tutionfee' => [
                'required',
                'string'
            ],
            'totalcost' => [
                'required',
                'string'
            ],
            'status' => [
                'nullable'
            ]
        ];
    }
}
