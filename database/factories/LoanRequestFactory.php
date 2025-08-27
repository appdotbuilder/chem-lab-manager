<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoanRequest>
 */
class LoanRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'request_number' => 'REQ-' . $this->faker->unique()->numberBetween(100000, 999999),
            'borrower_id' => User::factory(),
            'purpose' => $this->faker->sentence(),
            'requested_start_date' => $this->faker->dateTimeBetween('now', '+1 week'),
            'requested_end_date' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'status' => $this->faker->randomElement(['draft', 'submitted', 'approved', 'active']),
        ];
    }
}