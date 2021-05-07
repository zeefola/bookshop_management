<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'book_id' => 'required|exists:books,id,user_id,' . auth()->user()->id,
            'quantity' => 'required',
            'price' => 'required',
            'stock_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'book_id.exists' => 'BookID doesn\'t exist, Create a record & try again!!',
        ];
    }
}