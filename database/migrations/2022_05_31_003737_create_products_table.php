<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('distributor_id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', $precision = 15, $scale = 0);
            $table->string('berat');
            $table->enum('stok', ['Tersedia', 'Kosong']);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('jnsKulit');
            $table->string('masaSimpan');
            $table->text('deskripsi');
            $table->string('fotoProduk')->nullable();
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
        Schema::dropIfExists('products');
    }
}
