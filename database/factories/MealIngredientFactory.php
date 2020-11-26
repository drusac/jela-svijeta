<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\MealIngredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealIngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MealIngredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ingredients = Ingredient::pluck('id')->toArray();
        shuffle($ingredients);

        return [
            'ingredient_id' => $ingredients[0],
        ];
    }
}
