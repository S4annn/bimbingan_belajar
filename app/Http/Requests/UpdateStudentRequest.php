<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$this->student->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'school' => 'required|string|max:255',
            'grade' => 'required|string|max:50',
            'notes' => 'nullable|string',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
        ];
    }
}