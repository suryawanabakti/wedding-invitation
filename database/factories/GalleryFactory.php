<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 'https://picsum.photos/seed/'.$this->faker->unique()->word().'/800/600',
            'caption' => $this->faker->optional()->sentence(3),
            'sort_order' => 0,
        ];
    }
}
