<?php

namespace Tests\Feature\Recipe;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_recipes_index()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipes.index'));

        $response->assertStatus(200);
        $response->assertSee($recipe->title);
    }

    public function test_guest_can_view_single_recipe()
    {
        $recipe = Recipe::factory()->create();

        $response = $this->get(route('recipes.show', $recipe));

        $response->assertStatus(200);
        $response->assertSee($recipe->title);
        $response->assertSee($recipe->description);
    }

    public function test_authenticated_user_can_create_recipe()
    {
        $user = User::factory()->create();
        $recipeData = Recipe::factory()->make()->toArray();

        $response = $this->actingAs($user)
            ->post(route('recipes.store'), $recipeData);

        $response->assertRedirect(route('recipes.index'));
        $this->assertDatabaseHas('recipes', [
            'title' => $recipeData['title'],
        ]);
    }

    public function test_authenticated_user_can_update_recipe()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => $user->id]);
        $updateData = ['title' => 'Updated Title'];

        $response = $this->actingAs($user)
            ->put(route('recipes.update', $recipe), $updateData);

        $response->assertRedirect(route('recipes.index'));
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'title' => 'Updated Title',
        ]);
    }

    public function test_authenticated_user_can_delete_recipe()
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->delete(route('recipes.destroy', $recipe));

        $response->assertRedirect(route('recipes.index'));
        $this->assertDatabaseMissing('recipes', [
            'id' => $recipe->id,
        ]);
    }

    public function test_guest_cannot_create_update_or_delete_recipe()
    {
        $recipe = Recipe::factory()->create();
        $recipeData = Recipe::factory()->make()->toArray();

        $this->post(route('recipes.store'), $recipeData)
            ->assertRedirect(route('login'));

        $this->put(route('recipes.update', $recipe), ['title' => 'Test'])
            ->assertRedirect(route('login'));

        $this->delete(route('recipes.destroy', $recipe))
            ->assertRedirect(route('login'));
    }
}
