<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class FuncionarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('funcionarios')->insert([
            [
                'id' => Str::uuid(),
                'nome' => 'João Silva',
                'email' => 'joao.silva@empresa.com',
                'cpf' => '12345678901',
                'cargo' => 'Desenvolvedor PHP',
                'dataAdmissao' => '2022-01-15',
                'salario' => 5500.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'nome' => 'Maria Oliveira',
                'email' => 'maria.oliveira@empresa.com',
                'cpf' => '98765432109',
                'cargo' => 'Analista de Sistemas',
                'dataAdmissao' => '2023-03-20',
                'salario' => 6800.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}