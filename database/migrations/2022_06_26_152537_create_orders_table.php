<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reseller_id')->unsigned();
            $table->decimal('subtotal', $precision = 15, $scale = 0);
            $table->decimal('ongkir', $precision = 15, $scale = 0);
            $table->decimal('total', $precision = 15, $scale = 0);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('noTelp');
            $table->string('email');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kodepos');
            $table->string('buktiTransfer')->nullable();
            $table->enum('status', ['Memesan', 'Dikemas', 'Dikirim', 'Diterima', 'Dikembalikan', 'Dibatalkan'])->default('Memesan');
            $table->timestamps();

            $table->foreign('reseller_id')->references('id')->on('resellers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
