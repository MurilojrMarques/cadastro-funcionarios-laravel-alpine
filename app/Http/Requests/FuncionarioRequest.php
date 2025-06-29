<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $id = $this->funcionario?->id;

        return [
            'nome' => 'required|string|max:150',
            'email' => "required|email|max:150|unique:funcionarios,email,$id,id",
            'cpf' => "required|size:11|unique:funcionarios,cpf,$id,id",
            'cargo' => 'nullable|string|max:100',
            'dataAdmissao' => 'nullable|date',
            'salario' => 'nullable|numeric|min:0'
        ];
    }

    public function messages(): array {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O nome não pode ter mais que 150 caracteres.',
            
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais que 150 caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.size' => 'O CPF deve ter exatamente 11 caracteres.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            
            'cargo.max' => 'O cargo não pode ter mais que 100 caracteres.',
            
            'dataAdmissao.date' => 'Por favor, insira uma data válida.',
            
            'salario.numeric' => 'O salário deve ser um valor numérico.',
            'salario.min' => 'O salário não pode ser negativo.'
        ];
    }
}