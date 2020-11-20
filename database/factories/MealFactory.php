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
        static $number_EN_title = 1;
        static $number_HR_title = 1;

        $statusCreatedRecords = $this->faker->dateTimeInInterval('-10 years', '+ 5 days');

        return [
            'en' => [
                'title' => 'EN - Meal ' . $number_EN_title++, 
                'description' => 'EN - Description ' . $this->faker->paragraph(2),
            ],
            'hr' => [
                'title' => 'HR - Jelo ' . $number_HR_title++,
                'description' => 'HR - Opis ' . $this->faker->paragraph(2),
            ],
            'deleted_at' => $this->faker->randomElement([$this->faker->dateTimeThisYear(), null]),
            'created_at' => $this->faker->randomElement([$statusCreatedRecords]),
            'updated_at' => $this->faker->randomElement([$this->faker->dateTimeInInterval('-5 years', '+ 5 days'), $statusCreatedRecords]),
        ];
    }
}
