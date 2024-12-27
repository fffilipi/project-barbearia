<?php

namespace App\Http\Requests;

use App\Models\Employees;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Autorize a requisição, você pode adicionar lógica adicional se necessário
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Employees::class), // Verifica se o email é único na tabela employees
            ],
            'phone' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:active,inactive'], // Verifica se o status é 'active' ou 'inactive'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'first_name' => 'primeiro nome',
            'last_name' => 'sobrenome',
            'email' => 'endereço de e-mail',
            'phone' => 'telefone',
            'date_of_birth' => 'data de nascimento',
            'address' => 'endereço',
            'position' => 'cargo',
            'salary' => 'salário',
            'status' => 'status',
        ];
    }
}
