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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            
            $table->string('identity_no')->unique();
            $table->string('identity_type');
            $table->string('id_document')->nullable(); // file path

            $table->string('academic_session');
            $table->date('application_date');
            $table->string('application_no');
            $table->date('registration_date');
            $table->string('registration_no');
            $table->string('reg_type');
            $table->string('name');
            $table->date('dob');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->string('gurdian_name');
            $table->string('mother_name');
            $table->string('village')->nullable();
            $table->string('post');
            $table->string('block');
            $table->string('district');
            $table->string('state');
            $table->string('pincode', 10)->nullable();
            $table->string('country', 100);
            $table->string('religion', 100);
            $table->string('religion_category', 100);
            $table->string('caste', 100);
            $table->string('occupation');
            $table->string('eligibility', 100)->nullable();
            $table->enum('marital_status', ['Married', 'Unmarried']);
            $table->enum('area_type', ['Rular', 'Urban']);
            $table->string('help_needed')->nullable();
            $table->string('image')->nullable();
            $table->string('by')->nullable();
            $table->tinyInteger('status');
            $table->tinyInteger('survey_status');
            $table->string('delete_reason')->nullable();
            $table->date('delete_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
