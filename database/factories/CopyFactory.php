<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Copy>
 */
class CopyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $enum = ['loan','return','lost','damaged'];
        return [
            'code' => $this->faker->unique()->isbn13,
            'location' => rand(0,9).'-'.rand(0,9).'-'.rand(0,9),
            'state' => $enum[rand(0, 3)],
            'book_id' => Book::all()->random()->id,
        ];
    }
}
