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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title')->unique();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
