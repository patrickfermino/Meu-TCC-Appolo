<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sexo_usuario extends Seeder
{
 
    public function run(): void
    {
        DB::table('sexo_usuario')->insert([
            'nome' => 'masculino',
        ]);

        DB::table('sexo_usuario')->insert([
            'nome' => 'feminino',
        ]);

        DB::table('sexo_usuario')->insert([
            'nome' => 'nao_informar',
        ]);


    }
}
