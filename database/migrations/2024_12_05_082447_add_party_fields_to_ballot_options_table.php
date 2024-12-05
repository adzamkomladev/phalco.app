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
        Schema::table('ballot_options', function (Blueprint $table) {
            $table->string('party')->nullable();
            $table->string('party_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ballot_options', function (Blueprint $table) {
            $table->dropColumn('party_image');
            $table->dropColumn('party');
        });
    }
};
