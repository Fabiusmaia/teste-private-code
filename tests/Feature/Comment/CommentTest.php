<?php

namespace Tests\Feature\Recipe;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_leave_comment()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->post("/recipes/{$recipe->id}/comments", [
            'content' => 'Esse bolo parece ótimo!',
        ]);

        $response->assertRedirect(route('recipes.show', $recipe));
        $this->assertDatabaseHas('comments', [
            'recipe_id' => $recipe->id,
            'content' => 'Esse bolo parece ótimo!',
        ]);
    }

    public function test_comment_content_is_required()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->post("/recipes/{$recipe->id}/comments", [
            'content' => '',
        ]);

        $response->assertSessionHasErrors('content');
    }
}
