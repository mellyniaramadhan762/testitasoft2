<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            //
            'isbn' => 'required|digits:13|integer|unique:books,isbn',
            'name' => 'required|min:3',
            'year' => 'required|integer|digits:4',
            'page' => 'required|integer',
            'author' => 'required|min:3',
            'publisher' => 'required|exists:publishers,id',
        ];
    }
}
