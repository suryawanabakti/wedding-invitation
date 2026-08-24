<?php

namespace Database\Factories;

use App\Models\Wedding;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Wedding>
 */
class WeddingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'groom_short_name' => $this->faker->firstName('male'),
            'groom_full_name' => $this->faker->name('male'),
            'groom_title' => 'Putra ke-1',
            'groom_father' => 'Bapak '.$this->faker->firstName('male'),
            'groom_mother' => 'Ibu '.$this->faker->firstName('female'),
            'groom_photo' => null,
            'bride_short_name' => $this->faker->firstName('female'),
            'bride_full_name' => $this->faker->name('female'),
            'bride_title' => 'Putri ke-2',
            'bride_father' => 'Bapak '.$this->faker->firstName('male'),
            'bride_mother' => 'Ibu '.$this->faker->firstName('female'),
            'bride_photo' => null,
            'cover_photo' => null,
            'background_image' => null,
            'wedding_at' => $this->faker->dateTimeBetween('+1 month', '+1 year'),
            'akad_time' => 'Pukul 10.00 WIB - Selesai',
            'resepsi_time' => 'Pukul 13.00 WIB - Selesai',
            'address' => $this->faker->address(),
            'maps_url' => null,
        ];
    }
}
