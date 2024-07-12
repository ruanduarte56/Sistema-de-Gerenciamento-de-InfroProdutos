<?php

namespace Database\Seeders;

use App\Models\Afiliados;
use App\Models\filtros_produtos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class produtos_AfiliadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Afiliados::factory(10)->create();
        
    }
}
