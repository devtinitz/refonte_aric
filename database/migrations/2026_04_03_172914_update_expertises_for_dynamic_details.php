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
        Schema::table('expertises', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('title');
            $table->string('detail_title')->nullable()->after('image');
            $table->text('detail_description')->nullable()->after('detail_title');
            $table->string('detail_image')->nullable()->after('detail_description');
            $table->json('features')->nullable()->after('detail_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expertises', function (Blueprint $table) {
            //
        });
    }
};
