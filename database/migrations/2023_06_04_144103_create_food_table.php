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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('name');
            $table->mediumText('content');
            $table->string('slug');
            $table->json('price');
            $table->json('oldprice')->nullable();
            $table->json('extra')->nullable();
            $table->json('extra_price')->nullable();
            $table->bigInteger('qty');
            $table->string('currency');
            $table->longText('desc');
            $table->json('desc_row');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
