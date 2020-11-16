<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Meal;
use App\Models\Category;
use App\Models\Ingredient;
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
            ->has(Meal::factory()->count(5)
                ->has(Ingredient::factory()->count(3))
                ->has(Tag::factory()->count(3))
            )
            ->count(5)
            ->create();
    }
}
