<?php

namespace Database\Factories;

use App\Models\Book;
use Clockwork\Support\Laravel\Facade;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shelf>
 */
class ShelfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'slug' => fake()->slug(),
            'description' =>fake()->paragraph(),
        ];
    }
}
