@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    <h1 class="text-2xl mb-4">Funcionários</h1>

    <a href="{{ route('funcionarios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Novo Funcionário</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mt-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr class="bg-gray-100">
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Cargo</th>
                <th>Data Admissão</th>
                <th>Salário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            <tr class="border-t">
                <td>{{ $funcionario->nome }}</td>
                <td>{{ $funcionario->email }}</td>
                <td>{{ $funcionario->cpf }}</td>
                <td>{{ $funcionario->cargo }}</td>
                <td>{{ $funcionario->dataAdmissao }}</td>
                <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('funcionarios.edit', $funcionario) }}" class="text-blue-500">Editar</a>
                    
                    <button @click="if(confirm('Confirmar exclusão?')) $refs.form{{ $funcionario->id }}.submit();" class="text-red-500 ml-2">
                        Excluir
                    </button>

                    <form x-ref="form{{ $funcionario->id }}" method="POST" action="{{ route('funcionarios.destroy', $funcionario) }}" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection