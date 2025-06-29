@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar Funcionário</h1>

<form action="{{ route('funcionarios.update', $funcionario) }}" method="POST" class="bg-white shadow rounded p-4" x-data>
    @csrf
    @method('PUT')

    @include('funcionarios.form')

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Atualizar</button>
</form>
@endsection