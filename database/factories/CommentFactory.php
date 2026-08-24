<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'presence' => $this->faker->randomElement([Comment::PRESENCE_UNCONFIRMED, Comment::PRESENCE_ATTEND, Comment::PRESENCE_ABSENT]),
            'body' => $this->faker->sentence(10),
            'is_hidden' => false,
        ];
    }
}
