<?php

namespace Database\Factories;

use App\Models\produtos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class filtrosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'i_produto'=>produtos::pluck('id')->random(),
            'nome' => $this->faker->name(),
        ];
    }
}
