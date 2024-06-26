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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar', 100)->nullable();
            $table->string('no_hp')->unique();
            $table->string('propinsi')->nullable();
            $table->string('kota')->nullable();
            $table->text('alamat')->nullable();
            $table->string('institusi')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->text('alamat_usaha')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
