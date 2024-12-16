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
        Schema::create('ballot_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ballot_id')->nullable()->constrained();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->smallInteger('order')->nullable();
            $table->string('status');
            $table->string('party');
            $table->string('party_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballot_options');
    }
};
