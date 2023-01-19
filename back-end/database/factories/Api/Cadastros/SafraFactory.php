<?php

namespace Database\Factories\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api\Cadastros\AnoAgricula;
use App\Models\Api\Cadastros\Empresa;
use App\Models\Api\Cadastros\Safra;

class SafraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Safra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => Empresa::factory(),
            'ano_agricula_id' => AnoAgricula::factory(),
            'uuid' => $this->faker->uuid,
            'nome' => $this->faker->word,
            'inicio_safra' => $this->faker->date(),
            'final_safra' => $this->faker->date(),
            'status' => $this->faker->boolean,
        ];
    }
}
