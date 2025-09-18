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
        Schema::create('beneficiare_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('academic_session')->nullable();
            $table->string('beneficiarie_id')->nullable();
            $table->string('survey_id');
            $table->string('facilities')->nullable();
            $table->string('facilites_category')->nullable();
            $table->string('distribute_place')->nullable();
            $table->date('distribute_date')->nullable();
            $table->string('facilities_status')->nullable();
            $table->string('pending_reason')->nullable();
            $table->string('distribute_by')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiare_facilities');
    }
};
