<?php

namespace Database\Factories;

use App\Models\LoveGift;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LoveGift>
 */
class LoveGiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement([LoveGift::TYPE_TRANSFER, LoveGift::TYPE_QRIS, LoveGift::TYPE_GIFT]),
            'holder_name' => $this->faker->name(),
            'bank_name' => null,
            'account_number' => null,
            'image' => null,
            'phone' => null,
            'address' => null,
            'sort_order' => 0,
        ];
    }

    public function transfer(): static
    {
        return $this->state(fn (): array => [
            'type' => LoveGift::TYPE_TRANSFER,
            'bank_name' => 'Bank Central Asia',
            'account_number' => (string) $this->faker->numerify('############'),
        ]);
    }

    public function qris(): static
    {
        return $this->state(fn (): array => [
            'type' => LoveGift::TYPE_QRIS,
            'image' => 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=Wedding%20QRIS',
        ]);
    }

    public function gift(): static
    {
        return $this->state(fn (): array => [
            'type' => LoveGift::TYPE_GIFT,
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ]);
    }
}
