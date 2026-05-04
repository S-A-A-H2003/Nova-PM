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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->string('name');
            $table->string('description');
            $table->enum('category' , ['programming' , 'designing' , 'other'])->default('other');
            $table->enum('status' , ['active' , 'stopped'])->default('active');
            $table->enum('type' , ['free' , 'paid'])->default('free');
            $table->decimal('budget' , 15 , 2)->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
