<?php

namespace App\Repository\Interfaces;

use App\Models\Recipe;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface RecipeRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 10): LengthAwarePaginator; 
    public function find(int $id): ?Recipe;
    public function create(array $data): Recipe;
    public function update(Recipe $recipe, array $data): Recipe;
    public function delete(Recipe $recipe): void;
}
