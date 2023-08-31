<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'distributor_id' => mt_rand(1, 4),
            'namaDepan' => $this->faker->firstName(),
            'namaBelakang' => $this->faker->lastName(),
            'tempatLahir' => $this->faker->city(),
            'tanggalLahir' => $this->faker->dateTimeBetween('-35 years', '-18 years'),
            'jenisKelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
            'noTelp' => $this->faker->phoneNumber(),
            'email' => $this->faker->freeEmail(),
            'password' => bcrypt('seller123'),
            'remember_token' => Str::random(20),
        ];
    }
}
