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
        Schema::create('online_donations', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('donor_country', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('block', 150)->nullable();
            $table->string('donor_pincode', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('donor_idtype', 50)->nullable();
            $table->string('donor_aadhar', 20)->nullable();
            $table->string('donor_pancard', 20)->nullable();
            $table->string('category', 150)->nullable();
            $table->text('donation_remark')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('pending');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_donations');
    }
};
