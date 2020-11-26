<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MealTag extends Model
{
    use HasFactory;

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
