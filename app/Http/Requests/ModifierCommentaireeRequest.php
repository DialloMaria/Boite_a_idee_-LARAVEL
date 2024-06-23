<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierCommentaireeRequest extends FormRequest
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
        'nom_complet' => 'required|string|max:255',
        'libelle' => 'required|string|max:1000',
        ];
    }
    public function messages()
    {
        return [
            'nom_complet.required' => 'Votre nom est requis.',
            'libelle.required' => 'Le message est requis.',
        ];
    }

}
