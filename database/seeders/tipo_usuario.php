<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_usuario extends Seeder
{

    public function run(): void
    {
        DB::table('tipo_usuario')->insert([
            'nome' => 'admin',
        ]);

        DB::table('tipo_usuario')->insert([
            'nome' => 'artista',
        ]);

        DB::table('tipo_usuario')->insert([
            'nome' => 'contratante',
        ]);



    }
}
