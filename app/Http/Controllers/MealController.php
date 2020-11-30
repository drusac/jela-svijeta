<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Http\Requests\MealOptions;
use Illuminate\Support\Facades\App;
use App\Http\Resources\MealResource;

class MealController extends Controller
{
    public function index(MealOptions $request)
    {
        App::setLocale($request->query('lang'));

        $relationships = $request->query('with');
        $diff_time = $request->query('diff_time');
        $category_id = $request->query('category_id');
        $tags = $request->query('tags');
        $per_page = $request->query('per_page');

        return MealResource::collection(
            Meal::withTranslation()
                ->eagerLoad($relationships)
                ->diffTime($diff_time)
                ->whereCategory($category_id)
                ->searchByTagIds($tags)
                ->simplePaginate($per_page)
                // ->paginate($per_page)
        );
    }
}
