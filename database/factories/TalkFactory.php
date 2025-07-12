<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Enums\TalkType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talk>
 */
class TalkFactory extends Factory
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
            'title' => fake()->title(),
            'type' => fake()->randomElement(TalkType::cases())->value,
            'length' => rand(15,60),
            'abstract' => fake()->paragraph(),
            'organizer_notes' => fake()->paragraph()
        ];
    }
}
