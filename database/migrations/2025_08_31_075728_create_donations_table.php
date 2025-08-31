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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('Onlinereceipt_no')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('academic_session')->nullable();
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('gurdian_name')->nullable();
            $table->text('address')->nullable();
            $table->string('block')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('category')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('transaction_no')->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('depositor_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('recipient_name')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
