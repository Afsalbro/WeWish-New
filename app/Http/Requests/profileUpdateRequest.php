<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required|string|max:50',
            'dob' => "required|date_format:d/m/Y" //yyyy-mm-dd
        ];
    }
}
