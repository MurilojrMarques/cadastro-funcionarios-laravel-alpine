<div class="mb-2">
    <label class="block">Nome</label>
    <input type="text" name="nome" class="border p-2 w-full" value="{{ old('nome', $funcionario->nome ?? '') }}" required>
</div>

<div class="mb-2">
    <label class="block">Email</label>
    <input type="email" name="email" class="border p-2 w-full" value="{{ old('email', $funcionario->email ?? '') }}" required>
</div>

<div class="mb-2">
    <label class="block">CPF</label>
    <input type="text" name="cpf" class="border p-2 w-full" value="{{ old('cpf', $funcionario->cpf ?? '') }}" required>
</div>

<div class="mb-2">
    <label class="block">Cargo</label>
    <input type="text" name="cargo" class="border p-2 w-full" value="{{ old('cargo', $funcionario->cargo ?? '') }}">
</div>

<div class="mb-2">
    <label class="block">Data de Admissão</label>
    <input type="date" name="dataAdmissao" class="border p-2 w-full" value="{{ old('dataAdmissao', $funcionario->dataAdmissao ?? '') }}">
</div>

<div class="mb-4">
    <label class="block">Salário</label>
    <input type="number" step="0.01" name="salario" class="border p-2 w-full" value="{{ old('salario', $funcionario->salario ?? '') }}">
</div>