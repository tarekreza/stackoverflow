<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    { 
        if ($this->isMethod('POST')) {
            return [
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'username' => [
                    'required',
                    Rule::unique('users')
                        ->ignore($this->route('user'))
                ],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')
                        ->ignore($this->route('user'))
                ],
                // the password will be validated in the controller for put request.
                'password' => ['required', 'confirmed', 'min:8'],
            ];
        }
        else{
            return [
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'username' => [
                    'required',
                    Rule::unique('users')
                        ->ignore(Auth::user()->id)
                ],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')
                        ->ignore(Auth::user()->id)
                ],
            ];
        }
        
    }
    public function messages(): array
    {
        return [
            'password.confirmed' => 'The password and confirmation password does not match.',
        ];
    }
}
