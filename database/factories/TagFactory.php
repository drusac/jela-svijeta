<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

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
            'en' => ['title' => 'EN - Tag ' . $number_EN++],
            'hr' => ['title' => 'HR - Oznaka ' . $number_HR++],
            // 'title' => 'Tag ' . $number++,
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
