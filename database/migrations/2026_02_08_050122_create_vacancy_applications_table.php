<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vacancy_applications', function (Blueprint $table) {
            $table->id();

            // MUST match job_posts.id exactly
            $table->foreignId('job_post_id')
                  ->constrained('job_posts')
                  ->cascadeOnDelete();

            // Applicant info
            $table->string('name');
            $table->string('email')->index();
            $table->string('mobile', 20);

            // Resume path
            $table->string('resume');

            // Optional message
            $table->text('message')->nullable();

            // Admin status
            $table->enum('status', ['pending', 'shortlisted', 'rejected'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacancy_applications');
    }
};
