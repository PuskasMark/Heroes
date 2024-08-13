<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        do{
            $defence    = fake()->numberBetween(0,3);
            $strength   = fake()->numberBetween(0,20);
            $accuracy   = fake()->numberBetween(0,20);
            $magic      = fake()->numberBetween(0,20);
        }
        while (($defence  + $strength + $accuracy + $magic) > 20 );

        return [
            'name' => fake()->firstName(),
            'enemy' => fake()->boolean(),
            'defence' => $defence,
            'strength' => $strength,
            'accuracy' =>  $accuracy,
            'magic' => $magic,
        ];
    }
}
