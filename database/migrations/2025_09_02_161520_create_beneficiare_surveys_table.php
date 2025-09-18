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
        Schema::create('beneficiare_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('academic_session')->nullable();
            $table->string('beneficiarie_id');
            $table->string('survey_details')->nullable();
            $table->string('survey_officer')->nullable();
            $table->string('bene_category')->nullable();
            $table->json('surveyfacility_status')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->date('survey_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiare_surveys');
    }
};
