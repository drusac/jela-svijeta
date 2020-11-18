<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

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

    public function status()
    {
        return !request('diff_time') ? 'created' : ($this->deleted_at ? 'deleted' : ($this->created_at == $this->updated_at ? 'created' : 'modified'));
    }

    public function scopeDiffTime($query, $diff_time)
    {
        return !$diff_time ? $query : $query->withTrashed()->where('created_at', '>=', date("Y-m-d\TH:i:s\Z", $diff_time));
    }

    public function scopeEagerLoad($query, $relationships = [])
    {
        return empty($relationships) ? $query : $query->with($relationships);
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
