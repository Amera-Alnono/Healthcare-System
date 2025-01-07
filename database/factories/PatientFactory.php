<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;

    public function definition(): array
    {
        return [
           'user_id'=>User::factory(),
            'phone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'subscriptionStatus'=>fake()->randomElement(['Active','NotActive']),
            'document'=>fake()->name(),
            'RegistrationDate'=>fake()->date()

        ];
    }
}
