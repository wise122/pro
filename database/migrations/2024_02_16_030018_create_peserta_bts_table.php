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
        Schema::create('peserta_bts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('instansi_id');
            $table->string('uuid', 36);
            $table->string('nama');
            $table->string('nama_instansi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jadwal_bts_id');
            $table->enum('peran', ['peserta', 'moderator', 'narsum'])->default('peserta');
            $table->unsignedBigInteger('keahlian_id')->default(1);
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
        Schema::dropIfExists('peserta_bts');
    }
};
