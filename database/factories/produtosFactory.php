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
            'preco' => $this->faker->randomFloat(2,20,10000),
            'porcetagem_afiliacao' => $this->faker->randomFloat(2,0.2,0.8),
            'imagem' => $this->faker->imageUrl(200,200),
            'slug' => str::slug($nome),
            'pagina_de_vendas' => str::slug($nome.'/paginadevendas','-'),
            //
        ];
    }
}
