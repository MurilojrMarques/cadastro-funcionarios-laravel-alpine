@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Cadastrar Funcionário</h1>

<form action="{{ route('funcionarios.store') }}" method="POST" class="bg-white shadow rounded p-4" x-data>
    @csrf

    @include('funcionarios.form')

    <button class="bg-green-500 text-white px-4 py-2 rounded">Salvar</button>
</form>
@endsection