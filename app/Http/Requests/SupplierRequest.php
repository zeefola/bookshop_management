<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'book_id' => 'required|exists:books,id,user_id,' . auth()->user()->id,
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'email' => 'required|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
            'book_id.exists' => 'BookID doesn\'t exist, Create a record & try again!!',
        ];
    }
}