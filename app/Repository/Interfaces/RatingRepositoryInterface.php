<?php

namespace App\Repository\Interfaces;

use App\Models\Rating;

interface RatingRepositoryInterface
{
    public function create(array $data): Rating;
    public function findByRecipe(int $recipeId): array;
    public function averageByRecipe(int $recipeId): float;
}
