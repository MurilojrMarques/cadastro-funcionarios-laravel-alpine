<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Funcionario extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'cargo',
        'dataAdmissao',
        'salario',
    ];
}
