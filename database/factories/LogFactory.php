<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'status_code' => fake()->randomElement([200, 201, 404, 400, 500, 503, 504]),
            'time' => now(),
            'method' => fake()->randomElement(['post', 'get']),
            'path' => fake()->lexify('/????'),
            'http_version' => fake()->numerify('HTTP/1.#'),
        ];
    }
}
