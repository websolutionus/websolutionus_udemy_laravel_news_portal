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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->text('home_top_bar_ad');
            $table->boolean('home_top_bar_ad_status');
            $table->text('home_middle_ad');
            $table->boolean('home_middle_ad_status');
            $table->text('view_page_ad');
            $table->boolean('view_page_ad_status');
            $table->text('news_page_ad');
            $table->boolean('news_page_ad_status');
            $table->text('side_bar_ad');
            $table->boolean('side_bar_ad_status');
            $table->text('home_top_bar_ad_url')->nullable();
            $table->text('home_middle_ad_url')->nullable();
            $table->text('view_page_ad_url')->nullable();
            $table->text('news_page_ad_url')->nullable();
            $table->text('side_bar_ad_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
