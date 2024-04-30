<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nick' => 'admin',
            'password' => '$2y$10$.qbetwJa5iVPsEzU2V0pLe1YRKqGv9P.SIwk/vKmkJRdyo3CPZ3f2',
        ];
    }
}
