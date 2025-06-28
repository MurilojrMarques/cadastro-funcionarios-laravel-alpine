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
}