<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sexo_usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('{tipo_usuario}')->insert([
            'nome' => 'masculino',
        ]);

        DB::table('{tipo_usuario}')->insert([
            'nome' => 'feminino',
        ]);

        DB::table('{tipo_usuario}')->insert([
            'nome' => 'nao_informar',
        ]);


    }
}
