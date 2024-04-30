<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'email|unique:users',
            'phone_number' => 'required|numeric|unique:users',
            'pincode' => 'required|numeric',
            'experience' => 'required|numeric',
            'password' => 'required',
            'street_1' => 'required',
            'country_id' => 'required|numeric',
            'state_id'  =>  'required|numeric',
            'languages_spoken' => 'required',
            // 'avatar'        => ''
        ];
    }
}
