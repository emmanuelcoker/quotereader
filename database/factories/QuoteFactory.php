<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $min = 1; $max = 5;
        return [
            'author_id' => random_int( $min, $max ),
            'category_id' => random_int( $min, $max ), // password
            'content' => Str::random(10),
            'scheduled_date' => now()->addDays(random_int(1,7)),
        ];
    }
}
