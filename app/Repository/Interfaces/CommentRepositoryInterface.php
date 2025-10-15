<?php

namespace App\Repository\Interfaces;

use App\Models\Comment;

interface CommentRepositoryInterface
{
    public function create(array $data): Comment;
    public function findByRecipe(int $recipeId): array;
}
