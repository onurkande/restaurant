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
        Schema::create('about_chooses', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('title');
            $table->mediumText('content');
            $table->string('image');
            $table->json('rows')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_chooses');
    }
};
