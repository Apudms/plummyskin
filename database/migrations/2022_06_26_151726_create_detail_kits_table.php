<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marketing_kit_id')->unsigned();
            $table->string('kit');
            $table->timestamps();

            $table->foreign('marketing_kit_id')->references('id')->on('marketing_kits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kits');
    }
}
