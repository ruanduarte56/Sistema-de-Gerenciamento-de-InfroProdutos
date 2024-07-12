<?php

namespace Database\Factories;

use App\Models\filtros;
use App\Models\produtos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class filtros_produtosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filtros_id' => filtros::pluck('id')->random(),
            'produtos_id' => produtos::pluck('id')->random(),
        ];
    }
}
