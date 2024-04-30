<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Faker;
use App\Models\Casal;
use App\Models\Ciutat;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\casal>
 */
class CasalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fechaInicio = fake()->dateTimeBetween('-1 year', 'now');
        $fechaFin = fake()->dateTimeBetween($fechaInicio, '+1 year');

        $ciutatId = Ciutat::pluck('id')->random();

        return [
            'nom' => fake()->unique()->word(),
            'data_inici' => $fechaInicio,
            'data_final' => $fechaFin,
            'n_places' => fake()->numberBetween(1, 400),
            'id_ciutat' => $ciutatId,   
        ];
    }
}
