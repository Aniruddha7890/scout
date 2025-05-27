<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'movie_id' => $this->faker->unique()->numberBetween(1000, 99999),
            'original_title' => $this->faker->catchPhrase(),
            'original_language' => $this->faker->randomElement(['en', 'es', 'fr', 'de']),
            'overview' => $this->faker->paragraph(),
            'popularity' => $this->faker->randomFloat(2, 0, 1000),
            'poster_path' => $this->faker->imageUrl(),
            'backdrop_path' => $this->faker->imageUrl(),
            'release_date' => $this->faker->date(),
            'vote_average' => $this->faker->randomFloat(1, 0, 10),
            'vote_count' => $this->faker->numberBetween(0, 5000),
            'adult' => $this->faker->boolean(),
        ];
    }
}
