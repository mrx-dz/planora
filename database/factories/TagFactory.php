<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TagFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'color' => $this->faker->colorName()
        ];
    }
}
