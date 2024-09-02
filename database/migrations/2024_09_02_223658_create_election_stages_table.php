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
        Schema::create('election_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('stage', 50);
            $table->string('reason')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_stages');
    }
};
