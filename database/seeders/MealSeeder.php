<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Meal;
use App\Models\Ingredient;
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
        // Seed 5 meals without category
        Meal::factory()
            ->has(Ingredient::factory()->count(2))
            ->has(Tag::factory()->count(2))
            ->count(5)
            ->create();
    }
}
