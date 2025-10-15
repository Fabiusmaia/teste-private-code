<?php

namespace App\Services;

use App\Repository\Interfaces\RatingRepositoryInterface;
use App\Models\Recipe;
use App\Models\Rating;

class RatingService
{
    protected RatingRepositoryInterface $repository;

    public function __construct(RatingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createRating(Recipe $recipe, array $data): Rating
    {
        $data['recipe_id'] = $recipe->id;
        return $this->repository->create($data);
    }

    public function getRatingsForRecipe(int $recipeId): array
    {
        return $this->repository->findByRecipe($recipeId);
    }
}
