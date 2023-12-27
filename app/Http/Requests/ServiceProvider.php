<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProvider extends FormRequest
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
            'name' => 'required|string|regex:/^[a-zA-Z]+$/|min:5|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'company' => 'required|string',
            'password' => 'required|min:8|confirmed',
            'designation' => 'required|string',
        ];
    }
}
