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
        Schema::create('x_ray_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')->constrained();
            $table->string('chest')->nullable();
            $table->string('thoratic_vertebrae')->nullable();
            $table->string('lumbvar_vertibrae')->nullable();
            $table->string('cervical_vertebrae')->nullable();
            $table->string('lumbo_sacral_vertebrae')->nullable();
            $table->string('thoraco_lumbar_vertebrae')->nullable();
            $table->string('wrist_joint')->nullable();
            $table->string('thoratic_inlet')->nullable();
            $table->string('shoulder_joint')->nullable();
            $table->string('elbow_joint')->nullable();
            $table->string('knee_joint')->nullable();
            $table->string('sacro_iliac_joint')->nullable();
            $table->string('pelvic_joint')->nullable();
            $table->string('hip_joint')->nullable();
            $table->string('femoral')->nullable();
            $table->string('ankle')->nullable();
            $table->string('humerus')->nullable();
            $table->string('humerus')->nullable();
            $table->string('radius/ulner')->nullable();
            $table->string('foot')->nullable();
            $table->string('tibia/fibula')->nullable();
            $table->string('fingers')->nullable();
            $table->string('toes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('x_ray_records');
    }
};
