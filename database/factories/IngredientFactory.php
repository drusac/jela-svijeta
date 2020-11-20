<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number_EN = 1;
        static $number_HR = 1;
        
        return [
            'en' => ['title' => 'EN - Ingredient ' . $number_EN++],
            'hr' => ['title' => 'HR - Sastojak ' . $number_HR++],
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
