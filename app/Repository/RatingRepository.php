<?php

namespace App\Repository;

use App\Models\Rating;
use App\Repository\Interfaces\RatingRepositoryInterface;

class RatingRepository implements RatingRepositoryInterface
{
    public function create(array $data): Rating
    {
        return Rating::create($data);
    }

    public function findByRecipe(int $recipeId): array
    {
        return Rating::where('recipe_id', $recipeId)->get()->toArray();
    }

    public function averageByRecipe(int $recipeId): float
    {
        return round(Rating::where('recipe_id', $recipeId)->avg('score') ?? 0, 2);
    }
}
