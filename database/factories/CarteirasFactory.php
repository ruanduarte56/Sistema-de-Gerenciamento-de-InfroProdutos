<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarteirasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'tipo_transacao' => 'deposito',
        'valor' => $this->faker->randomFloat(2, 1, 1000),
        'i_usuario' => User::pluck('id')->random(),
        'data_transacao' => now(),
        'descricao' => $this->faker->sentence(),
    ];
}
}
