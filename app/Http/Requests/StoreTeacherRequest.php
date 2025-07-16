<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'specialization' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'join_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive'
        ];
    }
}