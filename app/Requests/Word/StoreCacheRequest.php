<?php

namespace App\Http\Requests\Word;

use Illuminate\Foundation\Http\FormRequest;

class StoreCacheRequest extends FormRequest
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
            'word' => 'required|min:2|max:250',
        ];
    }
}
