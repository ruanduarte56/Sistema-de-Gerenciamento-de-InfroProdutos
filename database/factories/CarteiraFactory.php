<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarteiraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'saldo' => $this->faker->randomNumber(4),
            'retirada' => $this->faker->randomNumber(4),
            'i_usuario'=>User::pluck('id')->random(),
        ];
    }
}
