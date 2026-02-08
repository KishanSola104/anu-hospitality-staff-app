<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location')->nullable();
            $table->string('job_type')->nullable();

            $table->text('description')->nullable();
            $table->text('requirements')->nullable();

            $table->boolean('status')->default(true); // true = open, false = closed

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
