<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {

            $table->id();

            $table->string('patient_id')->unique();

            $table->string('full_name');

            $table->string('mobile', 15);

            $table->enum('gender', [
                'male',
                'female',
                'other'
            ]);

            $table->date('dob')->nullable();

            $table->unsignedTinyInteger('age')->nullable();

            $table->text('address')->nullable();

            $table->string('blood_group')->nullable();

            $table->text('allergies')->nullable();

            $table->text('medical_history')->nullable();

            $table->string('emergency_contact')->nullable();
            $table->string('emergency_phone', 15)->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
