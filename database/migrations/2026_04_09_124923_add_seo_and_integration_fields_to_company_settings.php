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
        Schema::table('company_settings', function (Blueprint $table) {
            $table->text('meta_keywords')->nullable()->after('description');
            $table->string('google_analytics_id')->nullable()->after('whatsapp');
            $table->text('header_scripts')->nullable()->after('google_analytics_id');
            $table->text('footer_scripts')->nullable()->after('header_scripts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn(['meta_keywords', 'google_analytics_id', 'header_scripts', 'footer_scripts']);
        });
    }
};
