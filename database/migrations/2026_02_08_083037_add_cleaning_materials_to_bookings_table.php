<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            // Who provides cleaning materials
            $table->enum('cleaning_materials', ['customer', 'cleaner'])
                  ->default('customer')
                  ->after('access_method');

            // Extra charge if cleaner brings materials (£6)
            $table->decimal('materials_charge', 8, 2)
                  ->default(0.00)
                  ->after('base_price');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['cleaning_materials', 'materials_charge']);
        });
    }
};
