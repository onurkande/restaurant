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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('role_as')->default('0');
            $table->rememberToken();
            $table->timestamps();
            $table->string('fname');
            $table->string('lname');
            $table->string('cname')->nullable();
            $table->string('country');
            $table->longText('address1');
            $table->longText('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->bigInteger('citycode');
            $table->string('phone');
            $table->longText('additionalinfo')->nullable();
            $table->bigInteger('pincode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
