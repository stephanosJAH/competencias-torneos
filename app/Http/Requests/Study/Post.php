<?php

namespace App\Http\Requests\study;

use Illuminate\Foundation\Http\FormRequest;

class Post extends FormRequest
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
            'name' => 'required|string|max:255|unique:studies,name',
            'name_company' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'adress' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
        ];
    }


    public function validatedAndFormat(): array
    {
        $validated = parent::validated();
        $validated['user_id'] = auth()->id();

        return $validated;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser un texto',
            'name.max' => 'El nombre no debe exceder los 255 caracteres',
            'name.unique' => 'El nombre ya ha sido registrado',
            'name_company.string' => 'El nombre de la empresa debe ser un texto',
            'name_company.max' => 'El nombre de la empresa no debe exceder los 255 caracteres',
            'description.string' => 'La descripción debe ser un texto',
            'description.max' => 'La descripción no debe exceder los 255 caracteres',
            'adress.string' => 'La dirección debe ser un texto',
            'adress.max' => 'La dirección no debe exceder los 255 caracteres',
            'phone.string' => 'El teléfono debe ser un texto',
            'phone.max' => 'El teléfono no debe exceder los 255 caracteres',
            'email.string' => 'El email debe ser un texto',
            'email.max' => 'El email no debe exceder los 255 caracteres',
        ];
    }


}
