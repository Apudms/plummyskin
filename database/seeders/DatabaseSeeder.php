<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\DetailKit;
use App\Models\Distributor;
use App\Models\EdukasiMitra;
use App\Models\MarketingKit;
use App\Models\Post;
use App\Models\Product;
use App\Models\Reseller;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory(1)->create();
        Post::factory(10)->create();
        Distributor::create(
            [
                'namaDepan' => 'Fitri',
                'namaBelakang' => 'Yeni Gunasari',
                'slug' => 'fitri28',
                'tempatLahir' => 'Lampung Timur',
                'tanggalLahir' => '1999-12-28',
                'jenisKelamin' => 'Perempuan',
                'alamat' => 'Jl. Beringin 1 No. 40',
                'wilayah' => 'Bandar Lampung',
                'provinsi' => 'Lampung',
                'noTelp' => '(+62) 857-6902-9535',
                'noRek' => '5516581966105343',
                'bank' => 'Mandiri',
                'email' => 'yeni@gmail.com',
                'password' => bcrypt('yeni123'),
            ]
        );
        Distributor::factory(3)->create();
        Product::create(
            [
                'distributor_id' => 1,
                'name' => 'Masker Organik Mugwort',
                'slug' => 'mugwort13',
                'jnsKulit' => 'Semua Jenis Kulit',
                'masaSimpan' => '9 Bulan',
                'price' => '15500',
                'berat' => '25g',
                'stok' => 'Tersedia',
                'fotoProduk' => 'foto-products/LKnA6b6e9vfFODjMuOrt6swsO7ocNKUWfAoD4NnR.jpg',
                'quantity' => 100,
                'deskripsi' => 'Seperti yang kita ketahui bahwasannya masker sangat membantu untuk membersihkan wajah dan mengurangi minyak berlebih. Namun sering membuat kering, nah sekarang ada solusinya dengan menggunakan masker plummyskin karena ada kandungan aloevera, dll yang bisa melembabkan wajah.
                
                Note : Untuk mempermudah proses komplain penerimaan barang yang tidak sesuai, saat meneriman barang di himbau untuk mem-video-kan proses pembukaan paket yang masih tersegel.'
            ]
        );
        Product::create(
            [
                'distributor_id' => 1,
                'name' => 'Masker Organik Calendula',
                'slug' => 'calendula13',
                'jnsKulit' => 'Semua Jenis Kulit',
                'masaSimpan' => '9 Bulan',
                'price' => '15500',
                'berat' => '25g',
                'stok' => 'Tersedia',
                'fotoProduk' => 'foto-products/TAil4ui2yVjbYFjkczw6QUicY6geNWLonKj1jw10.jpg',
                'quantity' => 100,
                'deskripsi' => 'Seperti yang kita ketahui bahwasannya masker sangat membantu untuk membersihkan wajah dan mengurangi minyak berlebih. Namun sering membuat kering, nah sekarang ada solusinya dengan menggunakan masker plummyskin karena ada kandungan aloevera, dll yang bisa melembabkan wajah.
                
                Note : Untuk mempermudah proses komplain penerimaan barang yang tidak sesuai, saat meneriman barang di himbau untuk mem-video-kan proses pembukaan paket yang masih tersegel.'
            ]
        );
        Product::create(
            [
                'distributor_id' => 1,
                'name' => 'Masker Organik Saffron',
                'slug' => 'saffron13',
                'jnsKulit' => 'Semua Jenis Kulit',
                'masaSimpan' => '9 Bulan',
                'price' => '15500',
                'berat' => '25g',
                'stok' => 'Tersedia',
                'fotoProduk' => 'foto-products/z07eNsp99Lg4hsAr9Kj4CJriKfGzyuNAYXBqQKIm.jpg',
                'quantity' => 100,
                'deskripsi' => 'Seperti yang kita ketahui bahwasannya masker sangat membantu untuk membersihkan wajah dan mengurangi minyak berlebih. Namun sering membuat kering, nah sekarang ada solusinya dengan menggunakan masker plummyskin karena ada kandungan aloevera, dll yang bisa melembabkan wajah.
                
                Note : Untuk mempermudah proses komplain penerimaan barang yang tidak sesuai, saat meneriman barang di himbau untuk mem-video-kan proses pembukaan paket yang masih tersegel.'
            ]
        );
        Product::factory(7)->create();
        EdukasiMitra::create(
            [
                'link' => 'https://www.youtube.com/watch?v=AH4EoJLRKsE',
                'keterangan' => 'OMSET JUALAN DI TIKTOK SHOP! JUALAN LARIS DI TIKTOK SHOP'
            ]
        );
        EdukasiMitra::create(
            [
                'link' => 'https://www.youtube.com/watch?v=Jsm8EbupJBc',
                'keterangan' => 'Cara ikutan Campaign di Shopee'
            ]
        );
        EdukasiMitra::create(
            [
                'link' => 'https://www.youtube.com/watch?v=0VART5CMWMc',
                'keterangan' => '3 Teknik Closing untuk Jualan di Whatsapp'
            ]
        );
        EdukasiMitra::create(
            [
                'link' => 'https://www.youtube.com/watch?v=Nu9e8Y_Snjg',
                'keterangan' => '9 Langkah Biar ORDER MASUK RUTIN SETIAP HARI Cara Jualan Online'
            ]
        );
        EdukasiMitra::create(
            [
                'link' => 'https://www.youtube.com/watch?v=Eg2svGCdjAU',
                'keterangan' => 'RAHASIA LARIS MANIS JUALAN DI INSTAGRAM ALA DEWA EKA PRAYOGA'
            ]
        );
        EdukasiMitra::create(
            [
                'link' => 'https://www.youtube.com/watch?v=AH4EoJLRKsE',
                'keterangan' => 'Rp 750.000.000 OMSET JUALAN DI TIKTOK SHOP! JUALAN LARIS DI TIKTOK SHOP'
            ]
        );
        Reseller::factory(10)->create();
        MarketingKit::factory(8)->create();
        // DetailKit::factory(46)->create();
    }
}
