<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estoques')->insert([
            [
                'nome' => 'Bermuda',
                'quantidade' => 30,
            ],
            [
                'nome' => 'Camiseta',
                'quantidade' => 50,
            ],
            [
                'nome' => 'Boné',
                'quantidade' => 100,
            ]
        ]);
    }
}
