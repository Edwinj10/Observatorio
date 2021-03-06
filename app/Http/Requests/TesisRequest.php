<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TesisRequest extends FormRequest
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
            
            'tema' => 'required|max:300',
            'introduccion' => 'required|max:7900',
            // 'metodologia' => 'required|max:200',
            'autor' => 'required|max:200',
            'imagen'=> 'mimes:jpeg,bmp,png|max:8000',
            // 'archivo'=> 'required|mimes:pdf|max:5000',

    
        ];
    }
}
