<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FabricFormRequest extends FormRequest
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
            'code'=>'required | max:20',
            
            'content_id'=>'required',
            'supplier_id'=>'required ',
            'weight'=>'required | max:30',
            'width'=>'required | max:30',
            'coo'=>'required | max:100',    
            'description'=>'required | max:400', 
            'price'=>'required | max:100'
            
        ];
    }
}
