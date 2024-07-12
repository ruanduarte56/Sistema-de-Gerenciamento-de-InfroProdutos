<?php

namespace Database\Factories;

use App\Models\produtos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

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
            'nicho'=>$this->faker->randomElement(['saude física', 'saude mental','outro','lazer','educacao']),
            'formato_produto'=>$this->faker->randomElement(['digital','sowftare','físico']),
            'idioma'=>$this->faker->randomElement(['pt-br','eng','fr']),
            'moeda'=> $this->faker->randomElement(['real','euro','dolar']),
            'afiliados' => 1,
        ];
    }
}
