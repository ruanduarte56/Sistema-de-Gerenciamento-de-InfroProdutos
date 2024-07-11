<?php

namespace Database\Factories;

use App\Models\produtos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AfliadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'i_usuario'=>User::pluck('id')->random(),
            'i_produto'=>produtos::pluck('id')->random(),
        ];
    }
}
