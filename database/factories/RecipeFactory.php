<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'ingredients' => implode(", ", $this->faker->words(5)),
            'instructions' => $this->faker->paragraphs(2, true),
        ];
    }
}
