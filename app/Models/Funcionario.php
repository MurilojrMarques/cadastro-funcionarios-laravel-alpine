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

    public function getCpfFormatadoAttribute()
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $this->cpf);
    }
}
