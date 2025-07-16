<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:courses,name',
            'description' => 'nullable|string',
            'level' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'is_active' => 'required|boolean'
        ];
    }
}