<?php

namespace Database\Factories;

use App\Models\produtos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ConteudoProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo_conteudo=$this->faker->name();
        return [
            'titulo conteudo' => $titulo_conteudo,
            'descricao conteudo' => $this->faker->paragraph(),
            'video conteudo' => str::slug($titulo_conteudo),
            'arquivo conteudo' => str::slug($titulo_conteudo),
            'i_produto'=>produtos::pluck('id')->random(),
            
        ];
    }
}
