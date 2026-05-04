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
        Schema::create('cv_contents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('cv_id')->constrained()->cascadeOnDelete();
            $table->enum('type' , ['summary' , 'education' , 'skills' , 'professionalExperience' , 'languages' , 'courses']);
            $table->string('value');
            $table->json('extensions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_contents');
    }
};
