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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('program_category'); // e.g. Workshop, Seminar, etc.
            $table->string('program_name');     // Work/Program name
            $table->date('program_date');       // Program Date
            $table->string('academic_session');  // Session (e.g. 2025-26)
            $table->time('program_time');       // Time of event
            $table->text('program_address');    // Address
            $table->longText('program_report'); // Report / description
            $table->string('program_image')->nullable();
            $table->string('activity_by'); // Image file path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
