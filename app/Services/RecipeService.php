<?php

namespace App\Services;

use App\Models\Recipe;
use App\Repository\Interfaces\RecipeRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipeService
{
    protected RecipeRepositoryInterface $repository;

    public function __construct(RecipeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }

    public function getRecipe(Recipe $recipe): Recipe
    {
        return $this->repository->find($recipe->id) ?? $recipe;
    }

    public function createRecipe(array $data, int $userId): Recipe
    {
        $data['user_id'] = $userId;
        return $this->repository->create($data);
    }

    public function updateRecipe(Recipe $recipe, array $data): Recipe
    {
        return $this->repository->update($recipe, $data);
    }

    public function deleteRecipe(Recipe $recipe): void
    {
        $this->repository->delete($recipe);
    }
}
