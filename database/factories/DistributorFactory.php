<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DistributorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namaDepan' => $this->faker->firstNameFemale(),
            'namaBelakang' => $this->faker->lastName(),
            'slug' => $this->faker->word() . $this->faker->numberBetween(1, 1000),
            'tempatLahir' => $this->faker->state(),
            'tanggalLahir' => $this->faker->dateTimeBetween('-30 years', '-20 years'),
            'jenisKelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address(),
            'wilayah' => $this->faker->state(),
            'provinsi' => $this->faker->randomElement(['Lampung', 'Sumatera Selatan', 'Sumatera Barat']),
            'noTelp' => $this->faker->phoneNumber(),
            'noRek' => $this->faker->creditCardNumber(),
            'bank' => $this->faker->randomElement(['BRI', 'BNI', 'BCA', 'Mandiri']),
            'email' => $this->faker->freeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('distri123'),
            'remember_token' => Str::random(30),
        ];
    }
}
