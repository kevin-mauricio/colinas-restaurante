<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre_plato' => 'required|min:4',
            'descripcion' => 'required|min:5|max:60',
            'precio' => 'required|numeric|min:0',
            'costo' => 'required|numeric|min:0',
            'id_categoria' => [
                'required',
                Rule::notIn(['null']),
            ],
        ];
    }
}
