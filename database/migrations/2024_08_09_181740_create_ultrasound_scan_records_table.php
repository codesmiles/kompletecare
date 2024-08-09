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
        Schema::create('ultrasound_scan_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')->constrained();
            $table->string('obstetric')->nullable();
            $table->string('abdominal')->nullable();
            $table->string('pelvis')->nullable();
            $table->string('prostate')->nullable();
            $table->string('breasts')->nullable();
            $table->string('thyroid')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ultrasound_scan_records');
    }
};
