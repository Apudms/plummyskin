<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EdukasiMitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link' => $this->faker->imageUrl(640, 480, 'animals', true),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
