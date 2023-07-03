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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->mediumText('content');
            $table->json('icons')->nullable();
            $table->json('iconsUrl')->nullable();
            $table->string('ShTitle');
            $table->json('Shrows')->nullable();
            $table->json('ShRowsUrl')->nullable();
            $table->string('HlTitle');
            $table->json('HlRows')->nullable();
            $table->json('HlRowsUrl')->nullable();
            $table->string('CuTitle');
            $table->json('CuRows')->nullable();
            $table->json('CuIcons')->nullable();
            $table->mediumText('bottom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
