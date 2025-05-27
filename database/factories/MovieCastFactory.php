<?php

namespace Database\Factories;

use App\Models\MovieCast;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieCastFactory extends Factory
{
    protected $model = MovieCast::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'original_name' => $this->faker->name(),
            'popularity' => $this->faker->randomFloat(2, 0, 100),
            'profile_path' => $this->faker->imageUrl(),
            'character' => $this->faker->word(),
        ];
    }
}
