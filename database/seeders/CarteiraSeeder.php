<?php

namespace Database\Seeders;

use App\Models\carteiras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarteiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        carteiras::factory(10)->create();
        
    }
}
