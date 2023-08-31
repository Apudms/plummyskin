<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MarketingKitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipe' => $this->faker->randomElement(['Foto', 'Video']),
            'kit' => $this->faker->imageUrl(640, 480, 'animals', true),
            'keterangan' => $this->faker->randomElement(['Testimoni', 'Review Produk', 'Bukti order', 'Varian Calendula', 'Varian Mugwort', 'Varian Saffron']),
            // 'nama' => $this->faker->randomElement(['Testimoni', 'Review Produk', 'Bukti order', 'Varian Calendula', 'Varian Mugwort', 'Varian Saffron']),
            // 'tipe' => $this->faker->randomElement(['Foto', 'Video']),
        ];
    }
}
