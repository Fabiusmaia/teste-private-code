<?php

namespace App\Services;

use App\Models\Recipe;
use App\Repository\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentService
{
    protected CommentRepositoryInterface $repository;

    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createComment(Recipe $recipe, array $data): Comment
    {
        $data['recipe_id'] = $recipe->id;
        return $this->repository->create($data);
    }

    public function getCommentsByRecipe(Recipe $recipe): array
    {
        return $this->repository->findByRecipe($recipe->id);
    }
}
