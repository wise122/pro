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
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('slug');
            $table->integer('hits')->default(0);
            $table->enum('active', ['yes', 'no'])->default('yes');
            $table->enum('status', ['publish', 'draft'])->default('publish');
            $table->string('content_type');
            $table->unsignedBigInteger('content_id');
            $table->timestamps();

            $table->index(['content_type', 'content_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
};
