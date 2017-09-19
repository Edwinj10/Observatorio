<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitucionesRequest extends FormRequest
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
            'nombres' => 'required|max:100',
            'vision' => 'required|max:1000',
            'direccion' => 'required|max:100',
            'mision' => 'required|max:1000',
            'logo'=> 'mimes:jpeg,bmp,png',
        ];
    }
}
