<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'status' => 'created',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function scopeWhereCategory($query, $category_id)
    {
        return !$category_id ? $query : $query->where('category_id', $category_id);
    }

    public function scopeSearchByTagIds($query, $tag_ids = [])
    {
        return empty($tag_ids) ? $query : $query->whereHas('tags', function ($query) use ($tag_ids) {
            $query->whereIn('id', $tag_ids);
        });
    }
}
