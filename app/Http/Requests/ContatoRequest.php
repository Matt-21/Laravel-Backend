<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          'pessoa_id' => 'numeric|max:3',
          'nome' => 'required|string|max:180',
          'telefone' =>'required|string|max:15',
          'email' => 'required|email',
          'whatsapp' => 'required|string|max:15',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'Por favor, preecha o nome do contato!',
            'telefone.required' => 'Por favor, preecha o telefone do contato!',
            'email.required' => 'Por favor, preecha o e-mail do contato!',
            'whatsapp.required' => 'Por favor, preecha o whatsapp do contato!',
        ];
    }
}
