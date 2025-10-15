<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'score',
        'visitor_name',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
