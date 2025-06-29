@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: white;
    }
    
    .form-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 1.25rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color:rgb(0, 0, 0);
    }
    
    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        font-size: 1rem;
        transition: all 0.2s ease;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #4299e1;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
    }
    
    .form-input-error {
        border-color: #fc8181;
    }
    
    .error-message {
        color: #e53e3e;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    
    .submit-btn {
        width: 100%;
        padding: 0.75rem;
        background-color: #4299e1;
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .submit-btn:hover {
        background-color: #3182ce;
    }
    
    .submit-btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
    }
    
    .back-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background-color: #4299e1;
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-bottom: 1rem;
        text-decoration: none;
    }
    
    .back-btn:hover {
        background-color: #3182ce;
        transform: translateX(-2px);
    }
    
    @media (max-width: 640px) {
        .form-container {
            padding: 1.5rem;
            margin: 1rem;
        }
    }
</style>

<div class="form-container"
    x-data="{
        errors: {},
        validateField(field) {
            if (this.errors[field]) {
                delete this.errors[field];
            }
        },
        init() {
            @if($errors->any())
                this.errors = {{ json_encode($errors->toArray()) }};
            @endif
        }
    }"
>
    <a href="{{ route('funcionarios.index') }}" class="back-btn">
        Voltar
    </a>

    <h1 class="form-title">
        @isset($funcionario) Editar Funcionário @else Cadastrar Funcionário @endisset
    </h1>

    <form 
        action="{{ isset($funcionario) ? route('funcionarios.update', $funcionario) : route('funcionarios.store') }}" 
        method="POST"
        novalidate
    >
        @csrf
        @isset($funcionario)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="nome" class="form-label">Nome</label>
            <input
                type="text"
                id="nome"
                name="nome"
                class="form-input"
                :class="{ 'form-input-error': errors.nome }"
                value="{{ old('nome', $funcionario->nome ?? '') }}"
                x-on:input="validateField('nome')"
                required
            >
            <template x-if="errors.nome">
                <div class="error-message" x-text="errors.nome[0]"></div>
            </template>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-input"
                :class="{ 'form-input-error': errors.email }"
                value="{{ old('email', $funcionario->email ?? '') }}"
                x-on:input="validateField('email')"
                required
            >
            <template x-if="errors.email">
                <div class="error-message" x-text="errors.email[0]"></div>
            </template>
        </div>

        <div class="form-group">
            <label for="cpf" class="form-label">CPF</label>
            <input
                type="text"
                id="cpf"
                name="cpf"
                class="form-input"
                :class="{ 'form-input-error': errors.cpf }"
                value="{{ old('cpf', $funcionario->cpf ?? '') }}"
                x-on:input="validateField('cpf')"
                maxlength="11"
                required
            >
            <template x-if="errors.cpf">
                <div class="error-message" x-text="errors.cpf[0]"></div>
            </template>
            <small class="text-gray-500 text-sm">Digite apenas números (11 dígitos)</small>
        </div>

        <div class="form-group">
            <label for="cargo" class="form-label">Cargo</label>
            <input
                type="text"
                id="cargo"
                name="cargo"
                class="form-input"
                :class="{ 'form-input-error': errors.cargo }"
                value="{{ old('cargo', $funcionario->cargo ?? '') }}"
                x-on:input="validateField('cargo')"
            >
            <template x-if="errors.cargo">
                <div class="error-message" x-text="errors.cargo[0]"></div>
            </template>
        </div>

        <div class="form-group">
            <label for="dataAdmissao" class="form-label">Data de Admissão</label>
            <input
                type="date"
                id="dataAdmissao"
                name="dataAdmissao"
                class="form-input"
                :class="{ 'form-input-error': errors.dataAdmissao }"
                value="{{ old('dataAdmissao', $funcionario->dataAdmissao ?? '') }}"
                x-on:input="validateField('dataAdmissao')"
            >
            <template x-if="errors.dataAdmissao">
                <div class="error-message" x-text="errors.dataAdmissao[0]"></div>
            </template>
        </div>

        <div class="form-group">
            <label for="salario" class="form-label">Salário</label>
            <input
                type="number"
                step="0.01"
                id="salario"
                name="salario"
                class="form-input"
                :class="{ 'form-input-error': errors.salario }"
                value="{{ old('salario', $funcionario->salario ?? '') }}"
                x-on:input="validateField('salario')"
                min="0"
            >
            <template x-if="errors.salario">
                <div class="error-message" x-text="errors.salario[0]"></div>
            </template>
        </div>

        <button type="submit" class="submit-btn">
            @isset($funcionario) Atualizar Funcionário @else Cadastrar Funcionário @endisset
        </button>
    </form>
</div>
@endsection