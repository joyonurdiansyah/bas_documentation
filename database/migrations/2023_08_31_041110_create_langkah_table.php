<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangkahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langkah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_docs');
            $table->integer('urutan');
            $table->timestamps();

            $table->foreign('id_docs')->references('id')->on('dokumentasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('langkah');
    }
}
