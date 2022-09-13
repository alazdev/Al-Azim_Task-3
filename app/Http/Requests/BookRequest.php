<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'cover' => ['nullable','mimes:jpeg,jpg,png','max:2000'],
            'title' => ['required','max:50'],
            'publish_year' => ['required','integer','min:1970','max:'.(date('Y'))],
            'title' => ['required','max:100']
        ];
    }
}
