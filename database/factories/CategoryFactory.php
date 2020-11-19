<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'en' => ['title' => 'EN - Category ' . $number_EN++],
            'hr' => ['title' => 'HR - Kategorija ' . $number_HR++],
            // 'title' => 'Category ' . $number++,
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
