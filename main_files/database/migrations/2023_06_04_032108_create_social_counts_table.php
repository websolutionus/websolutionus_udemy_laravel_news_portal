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
        Schema::create('social_counts', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('icon');
            $table->string('fan_count');
            $table->string('fan_type');
            $table->string('button_text');
            $table->string('color');
            $table->text('url');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_counts');
    }
};
