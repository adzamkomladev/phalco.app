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

        Schema::table('election_stages', function (Blueprint $table) {
            $table->timestamp('start')->nullable();
            $table->dropColumn('reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('election_stages', function (Blueprint $table) {
            $table->dropColumn('start');
            $table->string('reason')->nullable();
        });
    }
};
