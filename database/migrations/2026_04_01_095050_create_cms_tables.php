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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->index();
            $table->string('type')->default('text'); // text, image, video, html
            $table->json('metadata')->nullable(); // options like alt, dimensions, etc.
            $table->timestamps();
        });

        Schema::create('content_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade');
            $table->longText('value')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->integer('version_number')->default(1);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_values');
        Schema::dropIfExists('contents');
    }
};
