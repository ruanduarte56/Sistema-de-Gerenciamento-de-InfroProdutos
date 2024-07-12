<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            usuariosSeeder::class,
            ProdutosSeeder::class,
            filtrosSeeder::class,
            CarteiraSeeder::class,
            //ConteudoProdutoSeeder::class,
            produtos_AfiliadosSeeder::class,
        ]);

    }
}
