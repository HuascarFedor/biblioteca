<?php

namespace Database\Factories;

use App\Models\Copy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'copy_id' => Copy::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'loan_date' => $this->faker->dateTimeBetween("-3 day", now()),
            'return_date' => now(),
        ];
    }
}
