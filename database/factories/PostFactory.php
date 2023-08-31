<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => 'judul' . $this->faker->numberBetween(1, 10),
            'isi' => $this->faker->sentence(),
        ];
    }
}
