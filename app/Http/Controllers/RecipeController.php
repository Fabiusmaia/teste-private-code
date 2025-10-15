<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Services\RecipeService;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RecipeController extends Controller
{
    protected RecipeService $service;

    public function __construct(RecipeService $service)
    {
        $this->service = $service;
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(): View
    {
        $recipes = $this->service->listAllPaginated(5);
        return view('recipes.index', compact('recipes'));
    }

    public function create(): View
    {
        return view('recipes.create');
    }

    public function edit(Recipe $recipe): View
    {
        return view('recipes.edit', compact('recipe'));
    }


    public function store(StoreRecipeRequest $request): RedirectResponse
    {
        $this->service->createRecipe($request->validated(), $request->user()->id);

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Receita criada com sucesso!');
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        $this->service->updateRecipe($recipe, $request->validated());

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Receita atualizada com sucesso!');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $this->service->deleteRecipe($recipe);

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Receita deletada com sucesso!');
    }


    public function show(Recipe $recipe): View|JsonResponse
    {
        $recipe = $this->service->getRecipe($recipe);

        $data = [
            'recipe' => $recipe,
            'comments' => $recipe->comments,
            'ratings' => $recipe->ratings,
            'average_rating' => (float) $recipe->averageRating(),
        ];



        return view('recipes.show', $data);
    }
}
