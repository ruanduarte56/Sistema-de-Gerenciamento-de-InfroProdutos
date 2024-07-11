<?php

namespace Database\Seeders;

use App\Models\Afliados;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AfliadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Afliados::factory(10)->create();
    }
}
