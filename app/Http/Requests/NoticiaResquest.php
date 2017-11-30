<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaResquest extends FormRequest
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
            'titulo' => 'required|max:150',
            'resumen' => 'required|max:100',
            'descripcion' => 'required|max:15000',
            'foto'=> 'mimes:jpeg,bmp,png|max:4000',
        ];
    }
}
