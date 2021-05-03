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
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'book_title' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'book_edition' => 'required',
            'isbn_number' => 'required',
            'published_date' => 'required',
            'published_country' => 'required'
        ];
    }
}