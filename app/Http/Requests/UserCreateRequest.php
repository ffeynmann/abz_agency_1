<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UserCreateRequest extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        $errors = $this->validator->errors();

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'fails' => $errors,
            ], 422)
        );
    }

    public function messages()
    {
        return [
            'email.regex'        => 'The email must be a valid email address.',
            'phone.regex'        => 'The phone must be a valid ukrainian phone number.',
            'position_id.exists' => 'The position_id is not exists'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'        => ['required', 'min:2', 'max:60'],
            'email'       => ['required', 'min:2', 'max:100', 'regex:/^(?:[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/', 'unique:users,email'],
            'phone'       => ['required', 'regex:/^[\+]{0,1}380([0-9]{9})$/', 'unique:users,phone'],
            'position_id' => ['required', 'min:1', 'exists:positions,id'],
            'photo'       => [
                'required',
                'mimetypes:image/jpeg,image/jpg',
                'max:5000',
                Rule::dimensions()->minWidth(70)->minHeight(70)
            ]
        ];
    }
}
