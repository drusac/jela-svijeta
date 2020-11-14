<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}