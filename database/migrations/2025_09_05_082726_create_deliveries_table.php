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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('task_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('project_id');
            $table->foreignUuid('user_id');
            $table->string('link');
            $table->string('feedback')->nullable();
            $table->boolean('is_best')->nullable();
            $table->enum('status' , ['not evaluation' , 'evaluation'])->default('not evaluation');
            $table->enum('evaluation' , ['pad' , 'good' , 'very good' , 'excellent'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
