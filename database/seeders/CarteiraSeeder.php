<?php

namespace Database\Seeders;

use App\Models\carteira;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarteiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        carteira::factory(10)->create();
        
    }
}
