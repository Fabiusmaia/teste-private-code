<?php

namespace Tests\Feature\Recipe;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_leave_rating()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->post("/recipes/{$recipe->id}/ratings", [
            'score' => 5,
        ]);

        $response->assertRedirect(route('recipes.show', $recipe));
        $this->assertDatabaseHas('ratings', [
            'recipe_id' => $recipe->id,
            'score' => 5,
        ]);
    }

    public function test_rating_must_be_between_1_and_5()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->post("/recipes/{$recipe->id}/ratings", [
            'score' => 6,
        ]);

        $response->assertSessionHasErrors('score');
    }
}
