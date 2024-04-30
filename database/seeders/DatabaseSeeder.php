<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ciutat;
use App\Models\Casal;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(1)->create();
        Ciutat::factory(10)->create();
        Casal::factory(10)->create();
    }
}
