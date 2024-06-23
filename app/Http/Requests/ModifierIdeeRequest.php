<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierIdeeRequest extends FormRequest
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
            'libelle' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'categorie_id' => 'required|exists:categories,id',    
        ];
    }
    
    public function messages()
    {
        return [
            'libelle.required' => 'Le libellé est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'nom_complet.required' => 'Le nom complet est obligatoire.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'categorie_id.required' => 'La catégorie est obligatoire.',
        ];
    }
}
