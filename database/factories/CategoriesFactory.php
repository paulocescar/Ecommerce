<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categories_products;

class CategoriesFactory extends Factory
{

    protected $model = Categories_products::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->descricao(),
            'idCategoriaPai' => rand(1, 10000),
        ];
    }
}
