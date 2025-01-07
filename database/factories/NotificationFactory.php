<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipientID'=>fake()->randomDigit(),
            'message'=>fake()->text(),
            'sentDate'=>fake()->date(),
            'status'=>fake()->randomElement(['seen','not seen'])

        ];
    }
}
