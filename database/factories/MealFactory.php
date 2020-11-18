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
        $statusCreatedRecords = $this->faker->dateTimeInInterval('-10 years', '+ 5 days');

        return [
            'title' => 'Meal ' . $number++,
            'description' => $this->faker->paragraph(3),
            'deleted_at' => $this->faker->randomElement([$this->faker->dateTimeThisYear(), null]),
            'created_at' => $this->faker->randomElement([$statusCreatedRecords]),
            'updated_at' => $this->faker->randomElement([$this->faker->dateTimeInInterval('-5 years', '+ 5 days'), $statusCreatedRecords]),
        ];
    }
}
