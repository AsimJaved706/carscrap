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
        Schema::create('car_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('postcode');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('registration_number')->nullable();
            $table->boolean('v5_present')->default(false);
            $table->boolean('keys_present')->default(false);
            $table->string('condition')->nullable();
            $table->boolean('driveable')->default(false);
            $table->text('message')->nullable();
            $table->json('photos')->nullable();
            $table->string('status')->default('new'); // new, contacted, completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_submissions');
    }
};
