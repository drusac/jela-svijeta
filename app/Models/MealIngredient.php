<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealIngredient extends Model
{
    use HasFactory;

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
