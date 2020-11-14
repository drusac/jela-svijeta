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
}
