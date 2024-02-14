<?php

namespace App\Http\Requests;

use App\Rules\UserStatusRule;
use App\Rules\ValidRole;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
            'name' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email,'.$this->user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'status' => ['required', new UserStatusRule], // Use the UserStatusRule custom rule
            'roles' => ['required', new ValidRole], // Use the ValidRole custom rule
        ];
    }
}
