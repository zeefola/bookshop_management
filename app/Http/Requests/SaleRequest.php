<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id,user_id,' . auth()->user()->id,
            'employee_id' => 'required|exists:employees,id,user_id,' . auth()->user()->id,
            'quantity' => 'required',
            'price' => 'required',
            'sales_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'book_id.exists' => 'BookID doesn\'t exist, Create a record & try again!!',
            'customer_id.exists' => 'CustomerID doesn\'t exist, Create a record & try again!!',
            'employee_id.exists' => 'EmployeeID doesn\'t exist, Create a record & try again!!',
        ];
    }
}