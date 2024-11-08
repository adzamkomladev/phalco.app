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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('organization_id')->nullable()->constrained();
            $table->string('account_name', 100);
            $table->string('account_number', 100);
            $table->string('channel_code', 50);
            $table->string('channel_name', 100);
            $table->string('network_code', 50);
            $table->string('network_name', 100);
            $table->string('gateway', 50);
            $table->string('currency', 10);
            $table->string('status', 50);
            $table->string('gateway_reference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
