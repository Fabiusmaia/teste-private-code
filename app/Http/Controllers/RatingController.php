<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Services\RatingService;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;

class RatingController extends Controller
{
    protected RatingService $service;

    public function __construct(RatingService $service)
    {
        $this->service = $service;
    }

    public function store(StoreRatingRequest $request, Recipe $recipe): RedirectResponse
    {
        $this->service->createRating($recipe, $request->validated());

        return redirect()->route('recipes.show', $recipe)->with('success', 'Rating adicionado com sucesso!');
    }
}
