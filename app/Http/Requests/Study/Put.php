<?php

namespace App\Http\Requests\study;

use Illuminate\Foundation\Http\FormRequest;

class Put extends FormRequest
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
        $id = $this->route('study')->id; // Get the 'id' parameter from the route
        return [
            'name' => 'required|string|max:255|unique:studies,name,' . $id,
            'name_company' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'adress' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
        ];
    }
}
