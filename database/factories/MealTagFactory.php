<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\MealTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MealTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = Tag::pluck('id')->toArray();
        shuffle($tags);

        return [
            'tag_id' => $tags[0],
        ];
    }
}
