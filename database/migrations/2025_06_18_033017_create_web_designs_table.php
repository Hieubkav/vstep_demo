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
        Schema::create('web_designs', function (Blueprint $table) {
            $table->id();
            $table->string('component_name'); // Hero, About, Services, etc.
            $table->string('component_key')->unique(); // hero, about, services
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->json('content')->nullable(); // Flexible content storage
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);
            $table->json('settings')->nullable(); // Component-specific settings
            $table->timestamps();

            $table->index(['is_active', 'position']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_designs');
    }
};
