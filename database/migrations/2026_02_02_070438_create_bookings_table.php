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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            /* Service info */
            $table->string('postcode');
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->json('extras')->nullable();
            $table->boolean('has_pets')->default(false);
            $table->unsignedTinyInteger('hours');

            /* Address */
            $table->string('full_name');
            $table->text('address');
            $table->string('city');
            $table->string('address_postcode');
            $table->string('mobile');
            $table->string('alt_mobile')->nullable();
            $table->text('instructions')->nullable();

            /* Schedule */
            $table->date('preferred_date');
            $table->string('arrival_window');
            $table->string('access_method');

            /* Pricing */
            $table->decimal('base_price', 8, 2);
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('total_price', 8, 2);

            /* Payment */
            $table->enum('payment_status', ['pending', 'paid', 'failed'])
                  ->default('pending');

            $table->string('stripe_session_id')->nullable();
            $table->string('stripe_payment_intent')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
