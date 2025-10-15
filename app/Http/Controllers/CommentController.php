<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Services\CommentService;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    protected CommentService $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function store(StoreCommentRequest $request, Recipe $recipe): RedirectResponse
    {
        $this->service->createComment($recipe, $request->validated());

        return redirect()->route('recipes.show', $recipe)->with('success', 'Comentário adicionado com sucesso!');
    }
}
