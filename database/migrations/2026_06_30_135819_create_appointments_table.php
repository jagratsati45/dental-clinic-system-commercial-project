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
    Schema::create('appointments', function (Blueprint $table) {

        $table->id();

        $table->string('appointment_no')->unique();

        $table->foreignId('patient_id')
              ->constrained()
              ->cascadeOnUpdate()
              ->restrictOnDelete();

        $table->date('appointment_date');

        $table->time('appointment_time');

        $table->text('chief_complaint');

        $table->enum('status', [
            'scheduled',
            'completed',
            'cancelled'
        ])->default('scheduled');

        $table->text('remarks')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
