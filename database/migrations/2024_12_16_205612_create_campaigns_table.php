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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained();
            $table->foreignId('election_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('audience_id')->constrained();
            $table->ulid('code')->unique();
            $table->enum('type', ['sms', 'emails', 'voice']);
            $table->string('payment_reference')->nullable();
            $table->enum('status', ['initiated', 'pending', 'processing', 'failed', 'completed', 'cancelled', 'paused']);
            $table->timestamp('scheduled_at')->nullable();
            $table->json('data')->nullable();
            $table->json('cost')->nullable();
            $table->json('settings')->nullable();
            $table->timestamps();

            $table->index('payment_reference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
