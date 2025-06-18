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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('address');
            $table->string('phone');
            $table->enum('experience_level', ['fresher', 'junior', 'middle', 'senior', 'expert']);
            $table->enum('desired_salary', ['under-10m', '10m-15m', '15m-20m', '20m-30m', '30m-50m', 'over-50m', 'negotiable'])->nullable();
            $table->text('skills');
            $table->enum('education_level', ['high-school', 'college', 'bachelor', 'master', 'phd']);
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
