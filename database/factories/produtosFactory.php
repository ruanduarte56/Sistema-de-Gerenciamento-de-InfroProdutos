<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class produtosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome=$this->faker->name();
        return [
            'nome' => $nome,
            'i_usuario'=>User::pluck('id')->random(),
            'descricao' => $this->faker->paragraph(),
            'preco' => $this->faker->randomFloat(4),
            'porcetagem afiliacao' => $this->faker->randomFloat(2,0.3,0.8),
            'imagem' => $this->faker->imageUrl(400,400),
            'slug' => str::slug($nome),
            'pagina de vendas' => str::slug($nome.'/paginadevendas','-'),
            //
        ];
    }
}
