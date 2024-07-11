<?php

namespace Database\Seeders;

use App\Models\filtros;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class filtrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filtros::factory(10)->create();
    }
}
