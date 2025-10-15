<?php

namespace App\Repository;

use App\Models\Recipe;
use App\Repository\Interfaces\RecipeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RecipeRepository implements RecipeRepositoryInterface
{
    public function all(): Collection
    {
        return Recipe::with(['comments', 'ratings', 'user'])->get();
    }

    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Recipe::with(['comments', 'ratings', 'user'])
            ->latest()
            ->paginate($perPage);
    }

    public function find(int $id): ?Recipe
    {
        return Recipe::with(['comments', 'ratings', 'user'])->find($id);
    }

    public function create(array $data): Recipe
    {
        return Recipe::create($data);
    }

    public function update(Recipe $recipe, array $data): Recipe
    {
        $recipe->update($data);
        return $recipe;
    }

    public function delete(Recipe $recipe): void
    {
        $recipe->delete();
    }
}
