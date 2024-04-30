<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Ciutat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ciutat>
 */
class CiutatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ca_ES');

        return [
            'nom' => $faker->unique()->city(),
            'n_habitants' => $faker->numberBetween(1, 100000),
        ];
    }
}
