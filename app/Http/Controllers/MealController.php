<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\MealOptions;
use App\Http\Resources\MealResource;

class MealController extends Controller
{
    public function index(MealOptions $request)
    {
        $relationships = $request->query('with');
        $diff_time = $request->query('diff_time');
        $category_id = $request->query('category_id');
        $tag_ids = $request->query('tag_ids');
        $per_page = $request->query('per_page');

        return MealResource::collection(
            Meal::eagerLoad($relationships)
                ->diffTime($diff_time)
                ->whereCategory($category_id)
                ->searchByTagIds($tag_ids)
                ->paginate($per_page)
        );
    }
}
