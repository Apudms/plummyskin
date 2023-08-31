<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_kits', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['Foto', 'Video'])->default('Foto');
            $table->string('kit');
            $table->string('keterangan');
            // $table->string('nama');
            // $table->enum('tipe', ['Foto', 'Video'])->default('Foto');
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
        Schema::dropIfExists('marketing_kits');
    }
}
