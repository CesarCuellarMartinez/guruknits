<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required | max:100',
            'address'=>'required | max:200',
            'contact'=>'required | max:200',
            'telephone'=>'required | max:100',
            'country'=>'required | max:100',
            'supplier_tipe_id'=>'required'
            
        ];
    }
}
