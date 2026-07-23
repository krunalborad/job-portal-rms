<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('job_type', ['Full-time', 'Part-time', 'Contract', 'Internship']);
            $table->string('location');
            $table->decimal('salary_min', 12, 2)->nullable();
            $table->decimal('salary_max', 12, 2)->nullable();
            $table->integer('experience_level')->default(0);
            $table->integer('open_positions')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
            $table->index('company_id');
            $table->index('published_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};