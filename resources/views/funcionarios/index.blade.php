@extends('layouts.app')

@section('content')
<style>
    .list-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: white;
    }
    
    .list-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 1.5rem;
    }
    
    .new-btn {
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
        text-decoration: none;
        margin-bottom: 1.5rem;
    }
    
    .new-btn:hover {
        background-color: #3182ce;
    }
    
    .alert-success {
        background-color: #c6f6d5;
        color: #22543d;
        padding: 1rem;
        border-radius: 0.375rem;
        margin-bottom: 1.5rem;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table th {
        background-color: #f7fafc;
        color: #4a5568;
        font-weight: 600;
        text-align: left;
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .table td {
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
        color: #2d3748;
    }
    
    .table tr:hover {
        background-color: #f8fafc;
    }
    
    .action-link {
        color: #4299e1;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    
    .action-link:hover {
        color: #3182ce;
        text-decoration: underline;
    }
    
    .delete-btn {
        color: #e53e3e;
        font-weight: 500;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        transition: all 0.2s ease;
    }
    
    .delete-btn:hover {
        color: #c53030;
        text-decoration: underline;
    }
    
    .action-buttons {
        display: flex;
        gap: 1rem;
    }
    
    @media (max-width: 768px) {
        .list-container {
            padding: 1rem;
            margin: 1rem;
        }
        
        .table {
            display: block;
            overflow-x: auto;
        }
    }
</style>

<div class="list-container">
    <h1 class="list-title">Funcionários</h1>

    <a href="{{ route('funcionarios.create') }}" class="new-btn">
        Novo Funcionário
    </a>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
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
            <tr>
                <td>{{ $funcionario->nome }}</td>
                <td>{{ $funcionario->email }}</td>
                <td>{{ $funcionario->cpf_formatado }}</td>
                <td>{{ $funcionario->cargo }}</td>
                <td>{{ $funcionario->dataAdmissao ? \Carbon\Carbon::parse($funcionario->dataAdmissao)->format('d/m/Y') : '' }}</td>
                <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('funcionarios.edit', $funcionario) }}" class="action-link">
                            Editar
                        </a>
                        <form method="POST" action="{{ route('funcionarios.destroy', $funcionario) }}" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                Excluir
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm('Tem certeza que deseja excluir este funcionário?');
    }
</script>
@endsection