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
        Schema::create('information', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('photo')->nullable();
            $table->string('date_pirth')->nullable();
            $table->enum('gender' , ['male' , 'female'])->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('link_one')->nullable();
            $table->string('link_two')->nullable();
            $table->string('link_three')->nullable();
            $table->string('link_one_as')->nullable();
            $table->string('link_two_as')->nullable();
            $table->string('link_three_as')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
