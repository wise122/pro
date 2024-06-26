<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_bts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('cover')->nullable();
            $table->string('slug');
            $table->string('judul');
            $table->dateTime('pelaksanaan_awal');
            $table->dateTime('pelaksanaan_akhir');
            $table->text('zoom');
            $table->json('nara_sumber')->nullable();
            $table->string('id_youtube')->nullable();
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
        Schema::dropIfExists('jadwal_bts');
    }
};
