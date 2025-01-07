<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id'=>Patient::factory(),
            'doctor_id'=>Doctor::factory(),
            'diagnosis'=>fake()->text(),
            'treatment'=>fake()->text(),
            'prescription'=>fake()->text(),
            // 'uploadDate'=>fake()->date(),
            // 'files'=>fake()->text()
        ];
    }
}
