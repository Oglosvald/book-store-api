<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Você pode definir aqui a lógica de autorização se necessário
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'ISBN' => 'required|string|unique:books',
            'Value' => 'required|numeric|min:0',
            'id_store' => 'required|exists:stores,id'
        ];
    }
}
