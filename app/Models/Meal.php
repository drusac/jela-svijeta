<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Meal extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    protected $guarded = [];

    public $translatedAttributes = ['title', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->hasMany(MealIngredient::class);
    }

    public function tags()
    {
        return $this->hasMany(MealTag::class);
    }

    public function status()
    {
        return !request('diff_time') ? 'created' : ($this->deleted_at ? 'deleted' : ($this->created_at == $this->updated_at ? 'created' : 'modified'));
    }

    public function scopeDiffTime($query, $diff_time)
    {
        return !$diff_time ? $query : $query->withTrashed()->where('created_at', '>=', date("Y-m-d\TH:i:s\Z", $diff_time));
    }

    public function scopeEagerLoad($query, $relationships)
    {
        // Remove spaces and trailing commas
        $relationships = rtrim(str_replace(' ', '', $relationships), ',');

        // Relationships filtered array
        $relationships_array = array_filter(explode(',', $relationships));

        // Relationship translations array
        $relationship_translations = array_map(function($value) {
            if ($value == 'category') return 'category.translations';
            if ($value == 'tags') return 'tags.tag.translations';
            if ($value == 'ingredients') return 'ingredients.ingredient.translations';
        }, $relationships_array);

        // Merged array ready for eager load
        $merged_relationships = array_merge($relationships_array, $relationship_translations);

        return empty($merged_relationships) ? $query : $query->with($merged_relationships);
    }

    public function scopeWhereCategory($query, $category_id)
    {
        if ($category_id == null) {
            return $query;
        } else if ($category_id == 'NULL') {
            return $query->whereNull('category_id');
        } else if ($category_id == '!NULL') {
            return $query->whereNotNull('category_id');
        } else {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeSearchByTagIds($query, $tags)
    {
        // Remove spaces and trailing commas
        $tags = rtrim(str_replace(' ', '', $tags), ',');

        // Tags filtered array
        $tags_array = array_filter(explode(',', $tags));

        return empty($tags_array) ? $query : $query->whereHas('tags', function ($query) use ($tags_array) {
            $query->whereHas('tag', function ($query) use ($tags_array) {
                $query->whereIn('id', $tags_array);
            });
        });
    }
}
