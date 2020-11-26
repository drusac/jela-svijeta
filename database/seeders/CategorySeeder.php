<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealTag;
use App\Models\Category;
use App\Models\MealIngredient;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->has(Meal::factory()
                ->has(MealIngredient::factory()->count(3), 'ingredients')
                ->has(MealTag::factory()->count(3), 'tags')
                ->count(10))
            ->count(5)
            ->create();
        
        Category::factory()->count(10)->create();
    }
}
