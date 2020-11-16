<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;

        return [
            'title' => 'Meal ' . $number++,
            'description' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['created', 'modified', 'deleted']),
        ];
    }
}
