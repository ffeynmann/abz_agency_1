<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'        => fake()->name(),
            'email'       => fake()->unique()->safeEmail(),
            'phone'       => sprintf('380%s%s', rand(1000, 9999), rand(10000, 99999)),
            'position_id' => rand(1, Position::query()->max('id')),
        ];
    }
}
