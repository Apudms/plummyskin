<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailKitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marketing_kit_id' => mt_rand(1, 8),
            'kit' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
