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
            'author_id' => 'required|exists:authors,id,user_id,' . auth()->user()->id,
            'publisher_id' => 'required|exists:publishers,id,user_id,' . auth()->user()->id,
            'book_edition' => 'required',
            'image' => ['sometimes', 'mimes:png,jpg,jpeg'],
            'isbn_number' => 'required',
            'published_date' => 'required',
            'published_country' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'author_id.exists' => 'AuthorID doesn\'t exist, Create a record & try again!!',
            'publisher_id.exists' => 'PublisherID doesn\'t exist, Create a record & try again!!',
        ];
    }
}