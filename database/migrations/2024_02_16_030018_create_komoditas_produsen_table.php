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
        Schema::create('komoditas_produsen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('jenis_komoditas')->nullable();
            $table->string('kategori_komoditas')->nullable();
            $table->string('nama_komoditas')->nullable();
            $table->string('alamat')->nullable();
            $table->string('produksi_kuantitas')->nullable();
            $table->string('produksi_waktu')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('photo')->nullable();
            $table->string('propinsi')->nullable();
            $table->string('kota')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('komoditas_produsen');
    }
};
