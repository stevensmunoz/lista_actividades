<?php

namespace App\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
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
            'titulo' => 'required|alpha|max:255',
        ];
    }

    public function messages()
    {
         return[
            'titulo.required' => 'El campo titulo es requerido',
            'titulo.alpha' => 'El campo tituo debe de ser letras',
            'titulo.max:255' => 'El titulo no puede ser mayor a 255 carateres',

        ];
    }
}
