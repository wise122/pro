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
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('metadesc')->nullable();
            $table->string('metadata')->nullable();
            $table->string('metakey')->nullable();
            $table->enum('active', ['yes', 'no'])->default('yes');
            $table->enum('status', ['publish', 'draft'])->default('publish');
            $table->string('image')->nullable()->default('no-image.jpg');
            $table->integer('hits')->default(0);
            $table->longText('content');
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
        Schema::dropIfExists('news');
    }
};
