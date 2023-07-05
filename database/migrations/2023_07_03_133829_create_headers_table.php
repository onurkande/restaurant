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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('imageUrl');
            $table->json('infoRows')->nullable();
            $table->json('infoRowsUrl')->nullable();
            $table->json('infoRowsIcon')->nullable();
            $table->json('icons')->nullable();
            $table->json('iconsUrl')->nullable();
            $table->json('pages')->nullable();
            $table->json('pagesUrl')->nullable();
            $table->string('indexMessage')->nullable(); //for this index page
            $table->string('indexTitle')->nullable();
            $table->string('indexContent')->nullable();
            $table->string('indexImage')->nullable();
            $table->string('indexDiscountMessage')->nullable();
            $table->string('indexSearchName')->nullable();
            $table->string('opTitle')->nullable(); //op means other page
            $table->string('opSmallTitle')->nullable();
            $table->string('opSmallTitleIcon')->nullable();
            $table->string('opSmallTitleUrl')->nullable();
            $table->string('opSmallTitle2')->nullable();
            $table->string('opImage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headers');
    }
};
