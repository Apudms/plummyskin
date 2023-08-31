<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('namaDepan');
            $table->string('namaBelakang')->nullable();
            $table->string('slug')->unique();
            $table->string('tempatLahir')->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->string('jenisKelamin')->nullable();
            $table->string('wilayah')->unique();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('noTelp')->nullable();
            $table->string('noRek')->nullable();
            $table->enum('bank', ['BRI', 'BNI', 'BCA', 'Mandiri'])->default('BRI');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributors');
    }
}
