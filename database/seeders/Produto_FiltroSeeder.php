<?php

namespace Database\Seeders;

use App\Models\filtros_produtos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Produto_FiltroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        filtros_produtos::factory(10)->create();

    }
}
