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
        // get an array of all user ids
        $users = User::pluck('id')->toArray();

        // generate comma seperated random 3 to 10 words
        $ingredients = $this->faker->words($this->faker->numberBetween(3, 10));
        $ingredients = implode(', ', $ingredients);

        return [
            'title' => $this->faker->word(),
            'user_id' => $this->faker->randomElement($users), // select a random user id from given array
            'description' => $this->faker->optional(0.8)->paragraph, // %80 percentages generates paragraph, otherwise null
            'ingredients' => $ingredients,
            'instructions' => $this->faker->paragraphs(3, true),
            'avg_min' => $this->faker->randomElement(['15', '30', '45', '60', '75', '90', '120', '180']),
            'deleted_at' => $this->faker->optional(0.2)->dateTimeThisYear, // %20 percentages generates datetime (start of this year to now), otherwise null
        ];
    }
}
