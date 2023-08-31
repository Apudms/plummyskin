<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'distributor_id' => mt_rand(2, 4),
            'name' => $this->faker->randomElement(['Masker Organik Calendula', 'Masker Organik Mugwort', 'Masker Organik Saffron']),
            'slug' => $this->faker->randomElement(['calendula', 'mugwort', 'saffron']) . $this->faker->numberBetween(1, 1000),
            'jnsKulit' => $this->faker->randomElement([
                'Semua Jenis Kulit',
                'Kulit Kering',
                'Kulit Lembab',
            ]),
            'masaSimpan' => $this->faker->randomElement(['3 Bulan', '6 Bulan', '9 Bulan', '12 Bulan']),
            'price' => '15500',
            'berat' => $this->faker->randomElement(['25g', '30g', '20g']),
            'stok' => 'Tersedia',
            'quantity' => $this->faker->numberBetween(30, 60),
            'deskripsi' => 'Seperti yang kita ketahui bahwasannya masker sangat membantu untuk membersihkan wajah dan mengurangi minyak berlebih. Namun sering membuat kering, nah sekarang ada solusinya dengan menggunakan masker plummyskin karena ada kandungan aloevera, dll yang bisa melembabkan wajah.
            
            Note : Untuk mempermudah proses komplain penerimaan barang yang tidak sesuai, saat meneriman barang di himbau untuk mem-video-kan proses pembukaan paket yang masih tersegel.'
        ];
    }
}
