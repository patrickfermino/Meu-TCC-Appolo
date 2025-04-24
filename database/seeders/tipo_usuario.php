<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tipo_usuario extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('{tipo_usuario}')->insert([
            'nome' => 'admin',
        ]);

        DB::table('{tipo_usuario}')->insert([
            'nome' => 'artista',
        ]);

        DB::table('{tipo_usuario}')->insert([
            'nome' => 'contratante',
        ]);



    }
}
