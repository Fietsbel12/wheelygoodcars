<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Tag;
use App\Models\User;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Maak 200 auto's aan en koppel willekeurige tags
        Car::factory()->count(250)->create()->each(function ($car) {
            $tags = Tag::inRandomOrder()->limit(rand(1, 5))->pluck('id'); // Kies 1-5 willekeurige tags
            $car->tags()->attach($tags);
        });
    }
}
