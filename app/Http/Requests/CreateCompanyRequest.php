<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'team_size' => 'required|integer',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'official_website' => 'required|url|max:255',
            'pan_number' => 'required|string|max:255',
            'pan_number_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gst_number' => 'required|string|max:255',
            'experience_in_month' => 'required|integer',
            'experience_in_year' => 'required|integer',
            'specialization' => 'required|string|max:255',
            'min_project_amount' => 'required|numeric',
            'min_project_currency' => 'required|string|max:255',
            'max_project_amount' => 'required|numeric',
            'max_project_currency' => 'required|string|max:255',
        ];
    }
}
