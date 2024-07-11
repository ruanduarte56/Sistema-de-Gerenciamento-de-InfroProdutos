<?php

namespace Database\Seeders;

use App\Models\ConteudoProduto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConteudoProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConteudoProduto::factory(10)->create();
    }
}
