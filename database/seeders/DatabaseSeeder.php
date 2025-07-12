<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Talk;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->has(Talk::factory()->count(5))
            ->create([
                'name' => 'Leigh Wills',
                'email' => 'test@example.com',
            ]);
    }
}
