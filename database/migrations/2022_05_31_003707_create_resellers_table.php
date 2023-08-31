<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resellers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('distributor_id')->unsigned();
            $table->string('namaDepan');
            $table->string('namaBelakang')->nullable();
            $table->string('tempatLahir')->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->string('jenisKelamin');
            $table->string('alamat')->nullable();
            $table->string('noTelp')->nullable();
            $table->string('foto')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resellers');
    }
}
