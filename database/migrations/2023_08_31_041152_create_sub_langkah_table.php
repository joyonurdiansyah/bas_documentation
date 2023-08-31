<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubLangkahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_langkah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_langkah');
            $table->string('judul');
            $table->text('keterangan');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('id_langkah')->references('id')->on('langkah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_langkah');
    }
}
