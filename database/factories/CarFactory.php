<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'license_plate' => strtoupper(fake()->bothify('??-###-??')),
            'brand' => fake()->randomElement(['Audi', 'Ford', 'BMW', 'Mercedes', 'Lotus']),
            'model' => fake()->word(),
            'price' => fake()->randomFloat(5000, 10000, 300000),
            'mileage' => fake()->numberBetween(10000, 300000),
            'seats' => fake()->numberBetween(2, 7),
            'doors' => fake()->numberBetween(2, 5),
            'production_year' => fake()->numberBetween(1990, 2024),
            'weight' => fake()->numberBetween(800, 3000),
            'color' => fake()->safeColorName(),
            'image' => fake()->imageUrl(640, 480, 'cars', true)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Car $car) {
            $tags = Tag::inRandomOrder()->limit(rand(1, 5))->pluck('id');
            $car->tags()->attach($tags);
        });
    }
}
