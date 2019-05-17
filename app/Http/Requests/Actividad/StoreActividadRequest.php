<?php

namespace App\Http\Requests\Actividad;

use Illuminate\Foundation\Http\FormRequest;

class StoreActividadRequest extends FormRequest
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
            'categoria_id' => 'numeric',
        ];
    }

    public function messages()
    {
         return[
            'titulo.required' => 'El campo titulo es requerido',
            'titulo.alpha' => 'El campo tituo debe de ser letras',
            'titulo.max:255' => 'El titulo no puede ser mayor a 255 carateres',
            'categoria_id.numeric' => 'El campo categoria es requerido',
        ];
    }


}
