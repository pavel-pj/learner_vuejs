<?php

namespace App\Http\Requests\Word;

use Illuminate\Foundation\Http\FormRequest;

class WordNewRequest extends FormRequest
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
            'word'=>'required|min:2|max:200',
            'translation_en'=>'max:250',
            'translation_ru'=>'max:250',
        ];
    }

    public function messages(): array
    {
        return [
            'word.required'=>'Word field is required',
           
        ];
    }
}
