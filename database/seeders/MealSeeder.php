<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealTag;
use App\Models\MealIngredient;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::factory()
            ->has(MealIngredient::factory()->count(3), 'ingredients')
            ->has(MealTag::factory()->count(3), 'tags')
            ->count(20)
            ->create();
    }
}
