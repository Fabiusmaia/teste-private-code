<?php

namespace App\Repository;

use App\Models\Comment;
use App\Repository\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public function findByRecipe(int $recipeId): array
    {
        return Comment::where('recipe_id', $recipeId)->get()->toArray();
    }
}
