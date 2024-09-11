<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('generated_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prompt_generation_id');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('prompt_generation_id')->references('id')->on('prompt_generations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_images');
    }
};
